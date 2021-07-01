<?php include 'incl.php'; ?>
<?php
$system = file_get_contents('system');
if ($system == 'Metric') {
    $antipode = 'Imperial';
} elseif ($system == 'Imperial') {
    $antipode = 'Metric';
}
$filename = $_REQUEST['name'];
$content = file_get_contents($filename);
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$basename = basename($filename, $extension);
?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>Read Value</title>
<link rel="shortcut icon" href="value.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?=$viewmode.'cli.css';?>?rev=<?=time();?>">
</head>
<body>
<?='WebHSIS Console started';?>
<br>
<?='Getting value of '.$filename;?>
<p></p>
<?php
include 'convdata.php';
if ($extension == 'usd' && $antigon == 'eur') {
    echo $iunit.$content.' = '.$ounit.$formula;
} elseif ($extension == 'eur' && $antigon == 'usd') {
    echo $iunit.$content.' = '.$ounit.$formula;
} else {
    echo $content.' '.$iunit.' = '.$formula.' '.$ounit;
}
?>
<p></p>
<?=$system.' to '.$antipode;?>
</body>
</html>
