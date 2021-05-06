<?php
$dir = '.';
$contents = str_replace($dir.'/','',(glob($dir.'/*.def')));
?>
<html>
<head>
<link rel="shortcut icon" href="polls.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Polls</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script>
function vote(id) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      xmlhttp.open("GET","poll.php?id="+id,true);
      xmlhttp.send();
    }
  }
  window.location.href = "poll.php?id="+id;
}
function info(id) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       xmlhttp.open("POST","pollinfo.php?id="+id,true);
       xmlhttp.send();
    }
  }
  window.location.href = "pollinfo.php?id="+id;
}
</script>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<table id="table" width="100%">
<thead>
<tr>
<th>Category</th>
<th>Value</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach ($contents as $key=>$value) { ?>
    <tr>
    <td>
    <?php
    $basename = basename($value, ".def");
    echo $basename;
    ?>
    </td>
    <td>
    <?php
    $filename = $value;
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
    } else {
        $content = '';
    }
    ?>
    <a href="<?=$content;?>">
    <?=$content;?></a>
    </td>
    <td>
    <input class="submit" id="voteButton" onclick="vote(this.name);" type="button" name=<?=$basename;?> value="Vote">
    <input class="button" id="infoButton" onclick="info(this.name);" type="button" name=<?=$basename;?> value="Info">
    </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</body>
</html>
