<?php include 'incl.php'; ?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>Main Menu</title>
<link rel="shortcut icon" href="menu.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="wsui.css?rev=<?=time();?>">
<?php include 'wpload.php'; ?>
</head>
<div class='window'>
<h1 align=center>
<a href="<?=$selficon;?>">
<img title="<?=$selftitle;?>" class=hover style="width:15%;" src="<?=$selficon;?>?rev=<?=time();?>"></a>
<?=$selftitle;?></h1>
<p align=center>
<a href="links.php">
<img title="Links" class=hover style="width:15%;" src="link.png?rev=<?=time();?>"></a>
<a href="pictures.php">
<img title="Pictures" class=hover style="width:15%;" src="picture.png?rev=<?=time();?>"></a>
<a href="music.php">
<img title="Music" class=hover style="width:15%;" src="music.png?rev=<?=time();?>"></a>
<a href="midi.php">
<img title="MIDI Player" class=hover style="width:15%;" src="midi.png?rev=<?=time();?>"></a>
<a href="videos.php">
<img title="Videos" class=hover style="width:15%;" src="video.png?rev=<?=time();?>"></a>
<br>
<a href="info.php">
<img title="Entity Info" class=hover style="width:15%;" src="info.png?rev=<?=time();?>"></a>
<a href="release.php">
<img title="Release Info" class=hover style="width:15%;" src="text.png?rev=<?=time();?>"></a>
<a href="hsis.php">
<img title="HSIS" class=hover style="width:15%;" src="hsis.png?rev=<?=time();?>"></a>
</p>
</div>
</body>
</html>
