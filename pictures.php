<?php include 'incl.php'; ?>
<?php
$index = file_get_contents('images.index');
$list = str_replace($dir.'/','',(glob($dir.'/*.{'.$index.'}', GLOB_BRACE)));
?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>Pictures</title>
<link rel="shortcut icon" href="picture.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="wsui.css?rev=<?=time();?>">
<?php include 'wpload.php'; ?>
<script>
function set(back) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      window.location.reload(true);
    }
  };
  xmlhttp.open("POST","wpset.php?back="+back,true);
  xmlhttp.send();
}
</script>
</head>
<div class="window">
<?php foreach ($list as $key=>$value) { ?>
    <img class="hover" height=35% name="<?=$value;?>" src="<?=$value;?>?rev=<?=time();?>" onclick="set(this.name);">
<?php } ?>
</div>
</body>
</html>
