<?php
if (file_exists('noedit')) {} else {
?>
<html>
<head>
<link rel="shortcut icon" href="web.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Go to</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<p align=center>
<img class='hover' style="height:25%;" src='web.png?rev=<?=time();?>'>
</p>
<h1 align=center>Go to URL</h1>
<p align=center class='large'>Go to specific page, website or resource</p>
<p align=center>
<input type='text' style="width:80%;" id='link' value="" onkeydown="
if (event.keyCode == 13) {
  window.location.href = this.value;
}">
<input type='button' class='submit' value='GO' onclick="window.location.href = document.getElementById('link').value;">
</p>
</div>
</body>
</html>
<?php } ?>
