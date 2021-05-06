<?php
if (file_exists('noedit')) {} else {
$system = file_get_contents('system');
if ($system == 'Metric') {
    $spaceunit = 'm';
    $moneyunit = 'eur';
} elseif ($system == 'Imperial') {
    $spaceunit = 'ft';
    $moneyunit = 'usd';
}
?>
<html>
<head>
<link rel="shortcut icon" href="settings.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Settings</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script>
function save() {
  var name = encodeURIComponent(document.getElementById("name").value);
  var type = document.getElementById("type").value;
  var description = encodeURIComponent(document.getElementById("description").value);
  var format = document.getElementById("format").value;
  var props = encodeURIComponent(document.getElementById("props").value);
  var welcome = encodeURIComponent(document.getElementById("welcome").value);
  var worth = document.getElementById("worth").value;
  var x = document.getElementById("x").value;
  var y = document.getElementById("y").value;
  var z = document.getElementById("z").value;
  var ammo = document.getElementById("ammo").value;
  var heal = document.getElementById("heal").value;
  var sups = document.getElementById("sups").value;
  var spec = document.getElementById("spec").value;
  var image = encodeURIComponent(document.getElementById("image").value);
  var audio = encodeURIComponent(document.getElementById("audio").value);
  var video = encodeURIComponent(document.getElementById("video").value);
  var dataString = 'name=' + name + '&type=' + type + '&description=' + description + '&format=' + format + '&props=' + props + '&welcome=' + welcome + '&worth=' + worth + '&x=' + x + '&y=' + y + '&z=' + z + '&ammo=' + ammo + '&heal=' + heal + '&sups=' + sups + '&spec=' + spec + '&image=' + image + '&audio=' + audio + '&video=' + video;
  $.ajax({
    type: "POST",
    url: "saveset.php",
    data: dataString,
    cache: false,
    success: function(html) {}
  });
  return false;
}
</script>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<h1>Settings</h1>
<form id="form" name="form">
<p>
<input class="west" id="wallpaper" style="height:40px;" onclick="window.location.href='backconfig.php'" type="button" value="Wallpaper">
<input class="north" id="theme" style="height:40px;" onclick="window.location.href='thmconfig.php';" type="button" value="Theme">
<input class="east" id="submit" style="height:40px;" onclick="save();window.location.reload();" type="button" value="Submit">
<input class="south" id="back" style="height:40px;" onclick="window.location.href='menu.php';" type="button" value="Back">
</p>
<label>Name: </label>
<input class="text" placeholder="Name your entity" id="name" type="text" size=25px value="
<?=file_get_contents('name');?>">
<br>
<label>Type: </label>
<input class="text" placeholder="Specify your entity type" id="type" type='text' size=26px value="
<?=file_get_contents('type');?>">
<br>
<textarea class="text" placeholder="Describe your entity" id="description" rows="4" cols="35">
<?=file_get_contents('description');?>
</textarea>
<br>
<label>Format: </label>
<input class="text" placeholder="Set date/time format" id="format" type="text" size=24px value="
<?=file_get_contents('format');?>">
<br>
<textarea class="text" placeholder="Property entries list" id="props" rows="4" cols="35">
<?=file_get_contents('info.list');?>
</textarea>
<br>
<textarea class="text" placeholder="Welcome text" id="welcome" rows="4" cols="35">
<?=file_get_contents('welcome');?>
</textarea>
<br>
<label>Worth: </label>
<input class="text" placeholder="File formats to display" id="worth" type="text" size=25px value="
<?=file_get_contents('worth.'.$moneyunit);?>">
<br>
<label>X: </label>
<input class="text" placeholder="Number" id="x" type="text" size=6px value="
<?=file_get_contents('x.'.$spaceunit);?>">
<label>Y: </label>
<input class="text" placeholder="Number" id="y" type="text" size=6px value="
<?=file_get_contents('y.'.$spaceunit);?>">
<label>Z: </label>
<input class="text" placeholder="Number" id="z" type="text" size=6px value="
<?=file_get_contents('z.'.$spaceunit);?>">
<br>
<label>Ammo: </label>
<input class="text" placeholder="Number" id="ammo" type="text" size=8px value="
<?=file_get_contents('ammo.spare');?>">
<label>Heal: </label>
<input class="text" placeholder="Number" id="heal" type="text" size=8px value="
<?=file_get_contents('heal.spare');?>">
<br>
<label>Supplies: </label>
<input class="text" placeholder="Number" id="sups" type="text" size=8px value="
<?=file_get_contents('sups.spare');?>">
<label>Specials: </label>
<input class="text" placeholder="Number" id="spec" type="text" size=8px value="
<?=file_get_contents('spec.spare');?>">
<br>
<label>Image index: </label>
<input class="text" placeholder="File formats to display" id="image" type="text" size=20px value="
<?=file_get_contents('images.index');?>">
<br>
<label>Audio index: </label>
<input class="text" placeholder="File formats to display" id="audio" type="text" size=20px value="
<?=file_get_contents('audio.index');?>">
<br>
<label>Video index: </label>
<input class="text" placeholder="File formats to display" id="video" type="text" size=20px value="
<?=file_get_contents('video.index');?>">
</form>
</div>
</body>
</html>
<?php } ?>
