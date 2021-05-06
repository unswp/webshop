<?php
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*', GLOB_ONLYDIR)));
if (file_exists('noedit')) {} else {
?>
<html>
<head>
<link rel="shortcut icon" href="stats.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Stats</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<style>
table, td, th, tr {
  text-align: center;
}
</style>
<script src="sort.js?rev=<?=time();?>"></script>
<script>
function upvote(id) {
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
  xmlhttp.open("POST","upvote.php?id="+id,true);
  xmlhttp.send();
}
function downvote(id) {
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
  };
  xmlhttp.open("POST","downvote.php?id="+id,true);
  xmlhttp.send();
}
function menu(id) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       xmlhttp.open("GET",id+"/menu.php",true);
       xmlhttp.send();
    }
  };
  window.location.href = id+"/menu.php";
}
function share(id) {
  var ret = window.location.href.replace('/stats.php','');
  var copy = ret + '/' + id;
  navigator.clipboard.writeText(copy);
}
function switchMode(id) {
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
  };
  xmlhttp.open("POST",id+"/switch.php",true);
  xmlhttp.send();
}
function convert(id) {
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
  };
  xmlhttp.open("POST",id+"/convert.php",true);
  xmlhttp.send();
}
</script>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<table id="table" width="100%">
<thead>
<tr>   
<th width=2%>Icon</th> 
<th width=10%>
<a href="javascript:SortTable(1,'T');">ID</a>
</th>
<th width=8%>Mode</th>
<th width=8%>System</th>
<th width=4%>
<a href="javascript:SortTable(4,'N');">Rating</a>
</th>
<th width=15%>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach ($list as $key=>$value) { ?>
    <tr>
    <td>
    <?php
    if (file_exists($value.'/favicon.png')) {
        $icon = $value.'/favicon.png';
    } else {
        $icon = 'entity.png';
    }
    ?>
    <a href="<?=$icon;?>">
    <img class=hover width=48px height=48px src="<?=$icon;?>?rev=<?=time();?>">
    </a>
    </td>
    <td>
    <a href="<?=$value;?>">
    <?=$value;?>
    </a>
    </td>
    <td>
    <?php
    $filename = $value.'/mode';
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
    } else {
        $content = '';
    }
    $mode = $content;
    ?>
    <input name="<?php echo $value; ?>" type=button class="
    <?php
    if ($mode == 'Light') {
        echo 'light';
    } elseif ($mode == 'Dark') {
        echo 'dark';
    } else {
        echo 'center';
    }
    ?>" value="<?=$mode;?>" onclick="switchMode(this.name);">
    </td>
    <td>
    <?php
    $filename = $value.'/system';
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
    } else {
        $content = '';
    }
    $system = $content;
    ?>
    <input name="<?=$value;?>" type=button class="
    <?php
    if ($system == 'Metric') {
        echo 'east';
    } elseif ($system == 'Imperial') {
        echo 'south';
    } else {
        echo 'center';
    }
    ?>" value="<?=$system;?>" onclick="convert(this.name);">
    </td>
    <td>
    <?php
    $filename = $value.'/rating';
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
    } else {
        $content = 0;
    }
    echo $content;
    ?>
    </td>
    <td>
    <input id="downvoteButton" class='south' onclick="downvote(this.name);" type="button" title="Downvote" name=<?=$value;?> value="-" style="width:30px;">
    <input id="upvoteButton" class='east' onclick="upvote(this.name);" type="button" title="Upvote" name=<?=$value;?> value="+" style="width:30px;">
    <input id="menuButton" class='west' onclick="menu(this.name);" type="button" title="Manage" name=<?=$value;?> value="#" style="width:32px;">
    <input id="shareButton" class='north' onclick="share(this.name);" type="button" title="Share" name="<?=$value;?>" value=">" style="width:32px;">
    </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</body>
</html>
<?php } ?>
