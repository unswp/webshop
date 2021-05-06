<?php
$index = $_REQUEST['q'];
$dir = '.';
if (file_exists('noedit')) {} else {
    $list = str_replace($dir.'/','',(glob($dir.'/*'.$index.'*')));
?>
<html>
<head>
<link rel="shortcut icon" href="gseek.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Search</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script src='http://www.midijs.net/lib/midi.js'></script>
<style>
table, td, th, tr {
  text-align: center;
}
</style>
<style>
audio {
  display: none;
}
</style>
<script src="sort.js?rev=<?=time();?>"></script>
<script>
function edit(name) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       xmlhttp.open("POST","gedit.php?name="+name,true);
       xmlhttp.send();
    }
  }
  window.location.href = "gedit.php?name="+name;
}
function remove(name) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       document.location.reload();
    }
  }
  xmlhttp.open("POST","delete.php?name="+name,true);
  xmlhttp.send();
}
function info(name) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       xmlhttp.open("POST","fileinfo.php?name="+name,true);
       xmlhttp.send();
    }
  }
  window.location.href = "fileinfo.php?name="+name;
}
</script>
<script>
function play(id) {
  var x = document.getElementById("audio");
  x.src = id;
  x.play();
}
function pause(id) {
  var x = document.getElementById("audio");
  x.pause();
}
</script>
<script>
function playMIDI(id) {
  MIDIjs.play(id);
}
function pauseMIDI(id) {
  MIDIjs.pause(id);
}
</script>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<table id="table" width="100%">
<thead>
<tr>
<th width=1%>Icon</th>
<th width=2%>
<a href="javascript:SortTable(1,'T');">Filename</a>
</th>
<th width=6%>
<a href="javascript:SortTable(2,'T');">Type</a>
</th>
<th width=4%>
<a href="javascript:SortTable(3,'N');">Size</a>
</th>
<th width=15%>Actions</th>
</tr>
</thead>
<tbody>
<?php
foreach ($list as $key=>$value) {
    include 'find.php'; ?>
    <tr>
    <td>
    <a href="<?=$icon;?>">
    <img class=hover width=48px height=48px src="<?=$icon;?>?rev=<?=time();?>">
    </a>
    </td>
    <td>
    <a href="<?=$link;?>">
    <?=$value;?>
    </a>
    </td>
    <td>
    <?=$type;?>
    </td>
    <td>
    <?=$filesize;?>
    </td>
    <td>
    <input id='editButton' class='west' title="Edit" name="<?=$value;?>" type="button" value="#" onclick="edit(this.name);" style="width:32px;">
    <input id='infoButton' class='center' title="Info" name="<?=$value;?>" type="button" value="i" onclick="info(this.name);" style="width:32px;">
    <input id='removeButton' class='south' title="Remove" name="<?=$value;?>" type=<?php
    if (file_exists($value.'.lock')) {
        $showmode = "hidden";
    } else {
        $showmode = "button";
    }
    echo $showmode;
    ?> value="-" onclick="remove(this.name);window.location.reload();" style="width:32px;">
    </td>
    </tr>
<?php } ?>
</tbody>
</table>
<audio id="audio">
</div>
</body>
</html>
<?php } ?>
