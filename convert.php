<?php include 'incl.php'; ?>
<?php
if ($system == "Metric") {
    $list = str_replace($dir.'/','',(glob($dir.'/*.{'.$MetricUnits.'}', GLOB_BRACE)));
} elseif ($system == "Imperial") {
    $list = str_replace($dir.'/','',(glob($dir.'/*.{'.$ImperialUnits.'}', GLOB_BRACE)));
}
?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>Convert Values</title>
<link rel="shortcut icon" href="convert.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?=$viewmode.'cli.css';?>?rev=<?=time();?>">
</head>
<body>
<?='WebHSIS Console started';?>
<br>
<?='Preparing to convert values';?>
<br>
<?='The entity measurement system was set to '.$system;?>
<p></p>
<?php
foreach ($list as $key=>$value) {
    echo 'Parsing '.$value.'...';
    $content = file_get_contents($value);
    $extension = pathinfo($value, PATHINFO_EXTENSION);
    $basename = basename($value, $extension);
    ?>
    <br>
    <?php
    $oldname = $basename.$extension;
    include 'convdata.php';
    $newname = $basename.$antigon;
    echo($oldname.' => '.$newname);
    ?>
    <br>
    <?php
    if ($extension == 'usd' && $antigon == 'eur') {
        echo $iunit.$content.' = '.$ounit.$formula;
    } elseif ($extension == 'eur' && $antigon == 'usd') {
        echo $iunit.$content.' = '.$ounit.$formula;
    } else {
        echo $content.' '.$iunit.' = '.$formula.' '.$ounit;
    }
    file_put_contents($newname, $formula);
    chmod($newname, 0777);
    chmod($oldname, 0777);
    unlink($oldname);
    ?>
    <p></p>
<?php } ?>
<p></p>
<?php echo 'All values are successfully converted';
if ($system == "Metric") {
    $antipode = "Imperial";
} elseif ($system == "Imperial") {
    $antipode = "Metric";
}
file_put_contents('system', $antipode);
chmod('system', 0777);
?>
<br>
<?='The entity measurements system is set to '.$antipode;?>
</body>
</html>
