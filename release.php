<?php include 'incl.php'; ?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>Release File</title>
<link rel="shortcut icon" href="text.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?=$viewmode.'.css';?>?rev=<?=time();?>">
</head>
<body>
<h1><?=$platform;?> <?=$version;?>: What's New?</h1>
<ul>
<?php foreach ($reldel as $key=>$value) { ?>
<li>
<?=$value;?>
</li>
<?php } ?>
</ul>
</body>
</html>
