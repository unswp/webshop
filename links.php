<?php include 'incl.php'; ?>
<?php
$list = str_replace($dir.'/','',(glob($dir.'/*.uri')));
?>
<html>
<head>
<?php include 'incl.php'; ?>
<title>Links</title>
<link rel="shortcut icon" href="link.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="wsui.css?rev=<?=time();?>">
<?php include 'wpload.php'; ?>
<style>
table, td, th, tr {
  text-align: center;
}
</style>
</script>
<script>
function add(str) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.location.reload();
    }
  };
  xmlhttp.open("POST","adlink.php?str="+str,true);
  xmlhttp.send();
}
function remove(id) {
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
  xmlhttp.open("POST","rmlink.php?id="+id,true);
  xmlhttp.send();
}
</script>
</head>
<div class='window'>
<div class='front'>
<label>Add link: </label>
<input id="newlink" placeholder="id>title>uri" type="text" style="width:60%;">
<input id="addButton" title="Add" class='east' onclick="add(newlink.value);" type="button" value="+" style="width:30px;">
</div>
<div class='full'>
<table id="table" width="100%">
<thead>
<tr>   
<th style="width:2%">Icon</th>
<th style="width:20%"><a href="javascript:SortTable(1,'T');">Name</a></th>
<th style="width:10%"><a href="javascript:SortTable(2,'T');">URI</a></th>
<th style="width:2%">Actions</th>
</tr>
</thead>
<tbody>
<?php
foreach ($list as $key=>$value) {
    $name = $value;
    $content = file_get_contents($value);
    $explode = explode(">", $content);
    $description = $explode[0];
    $uri = $explode[1];
    ?>
    <tr>
    <td>
    <a href=<?php echo 'link.png'; ?>>
    <img class=hover width=48px height=48px src="
    <?='link.png';?>?rev=<?=time();?>">
    </a>
    </td>
    <td>
    <a href=<?=$uri;?>>
    <?=$description;?>
    </a>
    </td>
    <td>
    <a href=<?=$uri;?>>
    <?=$uri;?>
    </a>
    </td>
    <td>
    <input id="removeButton" title="Remove" class='south' onclick="remove(this.name);" type="button" name=<?=$value;?> value="-" style="width:30px;" />
    </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</body>
</html>
