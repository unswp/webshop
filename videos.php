<?php
$dir = '.';
$index = file_get_contents('video.index');
$list = str_replace($dir.'/','',(glob($dir.'/*.{'.$index.'}', GLOB_BRACE)));
?>
<html>
<head>
<link rel="shortcut icon" href="video.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Videos</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<style>
table, td, th, tr {
  text-align: center;
}
</style>
<script>
function play(id) {
  var x = document.getElementById("video");
  x.src = id;
  x.play();
}
function pause(id) {
  var x = document.getElementById("video");
  x.pause();
}
</script>
</head>
<?php include 'panel.php'; ?>
<div class="window">
<div class="scene">
<video width=100% height=100% id="video" controls></video>
</div>
<div class="playlist">
<table width="100%">
<thead>
<tr>
<th width="2%">Icon</th>
<th width="10%">Filename</th>
<th width="5%">Actions</th>
<tr>
</thead>
<tbody>
<?php foreach ($list as $key=>$value) { ?>
    <tr>
    <td>
    <a href="video.png">
    <img class=hover width=48px height=48px src="video.png?rev=<?=time();?>">
    </a>
    </td>
    <td>
    <a href=<?=$value;?>><?=$value;?></a>
    </td>
    <td>
    <input id="playButton" class='east' onclick="play(this.name);" type="button" name=<?=$value;?> value=">">
    <input id="pauseButton" class='south' onclick="pause(this.name);" type="button" name=<?=$value;?> value="II">
    </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</body>
</html>
