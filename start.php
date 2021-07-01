<?php include 'incl.php'; ?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>Welcome Page</title>
<link rel="shortcut icon" href="favicon.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="wsui.css?rev=<?=time();?>">
<?php include 'wpload.php'; ?>
</head>
<div class='window'>
<p align=center>
<a href="<?=$selficon;?>">
<img class='hover' style="height:37%" src=<?=$selficon;?>?rev=<?=time();?>' title="<?=$selftitle;?>"></a></p>
<h1 align=center>Welcome to <?=$selftitle;?>!</h1>
<p align=center><input class='submit' style="width:150px;height:40px;font-weight:bold;" type="submit" onclick="window.location.href='menu.php'" value="Proceed"></p>
</p>
</div>
</body>
</html>
