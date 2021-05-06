<?php
if (file_exists('noedit')) {} else {
?>
<html>
<head>
<link rel="shortcut icon" href="misc.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Miscellaneous</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<h1 align=center>Miscellaneous</h1>
<p class='large' align=center>Pick a component to start with</p>
<p align=center>
<a href="links.php">
<img title="Links" class=hover style="width:16%;" src="link.png?rev=<?=time();?>"></a>
<a href="pictures.php">
<img title="Pictures" class=hover style="width:16%;" src="picture.png?rev=<?=time();?>"></a>
<a href="music.php">
<img title="Music" class=hover style="width:16%;" src="music.png?rev=<?=time();?>"></a>
<a href="midi.php">
<img title="MIDI Player" class=hover style="width:16%;" src="midi.png?rev=<?=time();?>"></a>
<a href="videos.php">
<img title="Videos" class=hover style="width:16%;" src="video.png?rev=<?=time();?>"></a>
<a href="hsis.php">
<img title="HSIS" class=hover style="width:16%;" src="hsis.png?rev=<?=time();?>"></a>
</p>
</div>
</body>
</html>
<?php } ?>
