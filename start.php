<?php
$dir = '.';
$list = str_replace('./','',(glob($dir.'/*', GLOB_ONLYDIR)));
?>
<html>
<head>
<link rel="shortcut icon" href="favicon.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title><?=file_get_contents('name');?></title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<p align=center><img class='hover' style="height:37%" src='favicon.png?rev=<?=time();?>'></p>
<h1 align=center>Welcome to <?=file_get_contents('name');?>!</h1>
<p align=center><?=file_get_contents('welcome');?></p>
<p align=center><input class='submit' style="width:150px;height:40px;font-weight:bold;" type="submit" onclick="window.location.href='menu.php'" value="Proceed"></p>
</p>
</div>
</body>
</html>
