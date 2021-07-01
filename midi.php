<?php include 'incl.php'; ?>
<?php
$list = str_replace($dir.'/','',(glob($dir.'/*.{mid,midi,rmi}', GLOB_BRACE)));
?>
<html>
<head>
<?php include 'libs.php'; ?>
<title>MIDI Player</title>
<link rel="shortcut icon" href="midi.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="wsui.css?rev=<?=time();?>">
<?php include 'wpload.php'; ?>
<script>
function play(id) {
  MIDIjs.play(id);
}
function pause(id) {
  MIDIjs.pause(id);
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
