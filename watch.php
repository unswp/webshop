<?php include 'incl.php'; ?>
<?php $filename = $_REQUEST['name']; ?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>Watch Video</title>
<link rel="shortcut icon" href="video.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?=$viewmode.'.css';?>?rev=<?=time();?>">
</head>
<body>
<video style="width:100%;height:100%;" id="video" src="<?=$filename;?>" controls autoplay="yes">
</body>
</html>
