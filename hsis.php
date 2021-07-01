<?php include 'incl.php'; ?>
<?php
if ($_REQUEST) {
    $augment = 1;
    $index = $_REQUEST['q'];
    if ($index == '/') {
        $list = str_replace($dir.'/','',(glob($dir.'/*', GLOB_ONLYDIR)));
    } elseif (strpos($index, ',')) {
        $list = str_replace($dir.'/','',(glob($dir.'/*.{'.$index.'}', GLOB_BRACE)));
    } else {
        $list = str_replace($dir.'/','',(glob($dir.'/*'.$index.'*')));
    }
} else {
    $augment = 0;
}
?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>HSIS</title>
<link rel="shortcut icon" href="hsis.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?=$viewmode.'.css';?>?rev=<?=time();?>">
<style>
table, td, th, tr {
  text-align: center;
}
audio {
  display: none;
}
</style>
<?php if (file_exists('noedit')) { ?>
<script>
window.onload = function() {
  document.getElementById('command').focus();
}
function execute() {
  var password = command.value;
  var dataString = 'password=' + password;
  $.ajax({
    type: "POST",
    url: "lock.php",
    data: dataString,
    cache: false,
    success: function(html) {
        window.location.href = 'hsis.php';
    }
  });
  return false;
  document.getElementById('command').focus();
}
</script>
<?php } else { ?>
<script>
window.onload = function() {
  document.getElementById('command').focus();
}
function play(id) {
  var x = document.getElementById("audio");
  x.src = id;
  x.play();
}
function pause(id) {
  var x = document.getElementById("audio");
  x.pause();
}
function playMIDI(id) {
  MIDIjs.play(id);
}
function pauseMIDI(id) {
  MIDIjs.pause(id);
}
function edit(name) {
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       xmlhttp.open("POST","edit.php?name="+name,true);
       xmlhttp.send();
    }
  }
  window.location.href = "edit.php?name="+name;
}
function info(name) {
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       xmlhttp.open("POST","file.php?name="+name,true);
       xmlhttp.send();
    }
  }
  window.location.href = "file.php?name="+name;
}
</script>
<?php } ?>
</head>
<body>
<div class='top'>
<input id='command' style="width:80%;" type=text value=""
<?php if (file_exists('noedit')) { ?>
placeholder="Enter password"
<?php } else { ?>
placeholder="Enter WebHSIS command"
<?php } ?> onkeydown="if (event.keyCode == 13) {
  execute();
}">
<input id='executeButton' class='east' title="Execute" name="<?=$value;?>" type="button" value=">" onclick="execute();" style="width:32px;">
<input id='clearButton' class='south' title="Clear" name="<?=$value;?>" type="button" value="X" onclick="command.value = ''; document.getElementById('command').focus();" style="width:32px;">
</div>
<div class='panel'>
<?php if (file_exists('noedit')) { ?>
<p align=center><img class='image' style="height:30vh;" src="security.png?rev=<?=time();?>"></p>
<p align=center class='huge'>The entity is locked</p>
<p align=center>Use the command line above to unlock this entity.</p>
<?php } else { ?>
<?php if ($augment == 0) { ?>
<p align=center>
<a href="<?php
if (file_exists('favicon.png')) {
    echo 'favicon.png';
} else {
    echo 'entity.png';
} ?>">
<img class='image' style="height:30vh;" src="<?php
if (file_exists('favicon.png')) {
    echo 'favicon.png?rev=<?=time();?>';
} else {
    echo 'entity.png?rev=<?=time();?>';
} ?>?rev=<?=time();?>"></a></p>
<p align=center class='huge'><?php
if ($title != '') {
    echo $title;
} else {
    echo $entity;
}
?></p>
<p align=center><?=$description;?></p>
<p align=center>
<?php
$count = count($quotes);
if (file_exists(rand(1,$count).'.q')) {
    echo file_get_contents(rand(1,$count).'.q');
} else {
    echo "";
}
?>
</p>
<?php } elseif ($augment == 1) { ?>
<table id="table" width=100%>
<thead>
<th>Icon</th>
<th width="20%">
<a href="javascript:SortTable(1,'T');">Name</th>
<th width="20%">
<a href="javascript:SortTable(2,'T');">Type</th>
<th width="50%">Actions</th>
</thead>
<tbody>
<?php
foreach ($list as $key=>$value) {
include 'find.php';
?>
<tr>
<td>
<a href="<?=$icon;?>">
<img class=hover height=50px src="<?=$icon;?>?rev=<?=time();?>">
</a>
</td>
<td>
<a href="<?=$link;?>"><?=$value;?></a>
</td>
<td><?=$type;?></td>
<td>
<input id='editButton' class='west' title="Edit" name="<?=$value;?>" type="button" value="#" onclick="edit(this.name);" style="width:32px;">
<input id='infoButton' class='center' title="Info" name="<?=$value;?>" type="button" value="i" onclick="info(this.name);" style="width:32px;">
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php } ?>
</div>
<audio id="audio">
<form method='POST' id='form' enctype='multipart/form-data'>
    <input type='file' id='file' name="file[]" multiple>
    <input type='submit' id='submit' name='submit' value="Upload">
</form>
<?php } ?>
</body>
</html>
