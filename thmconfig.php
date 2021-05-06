<?php
if (file_exists('noedit')) {} else {
?>
<html>
<head>
<link rel="shortcut icon" href="theme.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Set Up Theme</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script>
function save() {
  var back = document.getElementById("back").value;
  var gui = document.getElementById("gui").value;
  var icons = document.getElementById("icons").value;
  var icon = document.getElementById("icon").value;
  var dataString = 'back=' + back + '&gui=' + gui + '&icons=' + icons + '&icon=' + icon;
  $.ajax({
    type: "POST",
    url: "setthm.php",
    data: dataString,
    cache: false,
    success: function(html) {
      window.location.reload(true);
    }
  });
  return false;
}
</script>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<h1>Set Up Theme</h1>
<form id="form" name="form">
<label>Background image: </label>
<input class="text" type=text placeholder="Image filename" id="back" style="width:305px;" value=<?=file_get_contents('back.thm');?>>
<br>
<label>Interface theme: </label>
<input class="text" type=text placeholder="Interface theme ID" id="gui" style="width:305px;" value=<?=file_get_contents('gui.thm');?>>
<br>
<label>Icon theme: </label>
<input class="text" type=text placeholder="Icon theme ID" id="icons" style="width:346px;" value=<?=file_get_contents('icons.thm');?>>
<br>
<label>Website favicon: </label>
<input class="text" type=text placeholder="Icon filename" id="icon" style="width:342px;" value=<?=file_get_contents('icon.thm');?>>
<br>
<p></p>
<input class="submit" id="submit" style="width:150px;height:40px;font-weight:bold;" onclick="save();" type="button" value="Submit">
<input class="button" id="back" style="width:150px;height:40px;" onclick="window.history.back();" type="button" value="Back">
</form>
</div>
</body>
</html>
<?php } ?>
