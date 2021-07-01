<?php include 'incl.php'; ?>
<?php
$dir = dirname(__FILE__);
$entity = basename($dir);
if (file_exists('noedit')) {} else {
?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>Remove This Entity</title>
<link rel="shortcut icon" href="danger.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?=$viewmode.'cli.css';?>?rev=<?=time();?>">
</head>
<body>
<?='WebHSIS Console started!';?>
<br>
<?php
echo 'Removing '.$entity.'...'; ?>
<p></p>
<?php
echo 'Changing '.$entity.' directory mode to 0777...';
chmod($dir, 0777);
?>
<br>
<?php
echo 'Removing '.$entity.' directory with all its files and subdirectories...';
exec('rm -rf '.$dir);
?>
<p></p>
<?php echo $entity.' has been completely removed!'; ?>
<p></p>
</body>
</html>
<?php } ?>
