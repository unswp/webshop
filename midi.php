<?php
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*.{mid,midi,rmi}', GLOB_BRACE)));
?>
<html>
<head>
<link rel="shortcut icon" href="midi.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>MIDI Player</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script src='http://www.midijs.net/lib/midi.js'></script>
<script>
function play(id) {
  MIDIjs.play(id);
}
function pause(id) {
  MIDIjs.pause(id);
}
</script>
</head>
<?php include 'panel.php'; ?>
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
<?php
foreach ($list as $key=>$value) {
?>
    <tr>
    <td>
    <a href="midi.png">
    <img class=hover width=48px height=48px src="midi.png?rev=<?=time();?>">
    </a>
    </td>
    <td>
    <a href="<?=$value;?>">
    <?=$value;?>
    </a>
    </td>
    <td>
    <input id="playButton" class='east' onclick="play(this.name);" type="button" name=<?=$value;?> value=">" />
    <input id="pauseButton" class='south' onclick="pause(this.name);" type="button" name=<?=$value;?> value="II" />
    </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</body>
</html>
