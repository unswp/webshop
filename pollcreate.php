<html>
<head>
<link rel="shortcut icon" href="pollcreate.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Create New Poll</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script>
function create() {
  var category = document.getElementById("category").value;
  var value = document.getElementById("value").value;
  var values = document.getElementById("values").value;
  var range = document.getElementById("range").value;
  var dataString = 'category=' + category + '&value=' + value + '&values=' + values + '&range=' + range;
  $.ajax({
    type: "POST",
    url: "pollinit.php",
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
<h1>Create a new poll</h1>
<form id="form" name="form">
<label>Category: </label>
<input class="text" placeholder="All lowercase ID" size=28 id="category" type="text"><br>
<label>Value: </label>
<input class="text" placeholder="ID from list below" size=23 id="value" type="text"><br>
<textarea class="text" placeholder="Values list" id="values" rows="8" cols="35"></textarea><br>
<label>Range: </label>
<input class="text" size=25 id="range" placeholder="Number from 1 to specific" type="text"><br>
<p></p>
<input class="submit" id="submit" style="width:150px;height:40px;font-weight:bold;" onclick="create();window.history.back();" type="button" value="Submit">
<input class="button" id="back" style="width:150px;height:40px;" onclick="window.history.back();" type="button" value="Back">
</form>
</div>
</body>
</html>
