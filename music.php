<?php include 'incl.php'; ?>
<?php
$index = file_get_contents('audio.index');
$list = str_replace($dir.'/','',(glob($dir.'/*.{'.$index.'}', GLOB_BRACE)));
?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>Music</title>
<link rel="shortcut icon" href="music.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="wsui.css?rev=<?=time();?>">
<?php include 'wpload.php'; ?>
<style>
table, td, th, tr {
  text-align: center;
}
</style>
<script>
function play(id) {
  var x = document.getElementById("audio");
  x.src = id;
  x.play();
}
function pause(id) {
  var x = document.getElementById("audio");
  x.pause();
}
</script>
</head>
<div class="window">
<table width="100%">
<thead>
<tr>
<th width="2%">Icon</th>
<th width="10%">Filename</th>
<th width="5%">Actions</th>
</tr>
</thead>
<tbody>
<?php foreach ($list as $key=>$value) { ?>
    <tr>
    <td>
    <a href="music.png">
    <img class=hover width=48px height=48px src="music.png?rev=<?=time();?>">
    </a>
    </td>
    <td>
    <a href=<?=$value;?>>
    <?=$value;?>
    </a>
    </td>
    <td>
    <input id="playButton" class='east' onclick="play(this.name);" type="button" name=<?=$value;?> value=">">
    <input id="pauseButton" class='south' onclick="pause(this.name);" type="button" name=<?=$value;?> value="II">
    </td>
    </tr>
<?php } ?>
</tbody>
</table>
<audio id="audio">
</div>
</body>
</html>
