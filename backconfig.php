<?php
$dir = '.';
if (file_exists('noedit')) {} else {
    $index = file_get_contents('images.index');
    $list = str_replace($dir.'/','',(glob($dir.'/wp.*.{'.$index.'}', GLOB_BRACE)));
?>
<html>
<head>
<link rel="shortcut icon" href="picture.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Background Settings</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script>
function set(back) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      window.location.reload(true);
    }
  };
  xmlhttp.open("POST","setback.php?back="+back,true);
  xmlhttp.send();
}
</script>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<h1>Set Up Background</h1>
<?php
foreach($list as $key=>$value) { ?>
<img class="hover" height=35% name="<?=$value;?>" src="<?=$value;?>?rev=<?=time();?>" onclick="set(this.name);">
<?php } ?>
</div>
</body>
</html>
<?php } ?>
