<html>
<head>
<link rel="shortcut icon" href="register.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script>
function register() {
  var name = document.getElementById("name").value;
  var type = document.getElementById("type").value;
  var title = encodeURIComponent(document.getElementById("title").value);
  var description = encodeURIComponent(document.getElementById("description").value);
  var dataString = 'name=' + name + '&type=' + type + '&title=' + title + '&description=' + description;
  $.ajax({
    type: "POST",
    url: "init.php",
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
<h1>Registration</h1>
<form id="form" name="form">
<label>ID: </label>
<input class="text" placeholder="Your entity unique ID" size=28 id="name" type="text"><br>
<label>Type: </label>
<input class="text" placeholder="Specify your entity type" size=26 id="type" type="text"><br>
<label>Name: </label>
<input class="text" placeholder="Name your entity" id="title" type="text" size=25><br>
<textarea class="text" placeholder="Describe your entity" id="description" rows="8" cols="35"></textarea><br>
<p></p>
<input class="submit" id="submit" style="width:150px;height:40px;font-weight:bold;" onclick="register();window.history.back();" type="button" value="Submit">
<input class="button" id="back" style="width:150px;height:40px;" onclick="window.history.back();" type="button" value="Back">
</form>
</div>
</body>
</html>
