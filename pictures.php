<?php
$dir = '.';
$index = file_get_contents('images.index');
$list = str_replace($dir.'/','',(glob($dir.'/*.{'.$index.'}', GLOB_BRACE)));
?>
<html>
<head>
<link rel="shortcut icon" href="picture.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Pictures</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
</head>
<?php include 'panel.php'; ?>
<div class="window">
<?php foreach ($list as $key=>$value) { ?>
    <img class="hover" height=35% name="<?=$value;?>" src="<?=$value;?>?rev=<?=time();?>" onclick="window.location.href=this.name;">
<?php } ?>
</div>
</body>
</html>
