<html>
<head>
<link rel="shortcut icon" href="chat.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Chat</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script>
function send() {
  var name = document.getElementById("name").value;
  var message = encodeURIComponent(document.getElementById("message").value);
  var dataString = 'name=' + name + '&message=' + message;
  $.ajax({
    type: "POST",
    url: "send.php",
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
<textarea class="text" id="thread" style="width:100%;height:70%;">
<?=file_get_contents('thread');?></textarea><hr>
<form style="width:100%;" id="form" name="form">
<label>Your name: </label>
<input class="text" placeholder="Type an entity ID" style="width:70%;height:35px;" id="name" type="text"><br>
<input class="text" placeholder="Enter your message here" id="message" type="text" style="width:70%;height:45px;" onkeydown="if (event.keyCode == 13) {send();
location.reload();
return false;}">
<input class="button" id="submit" style="width:80px;height:50px;" onclick="send();
location.reload();
return false;" type="button" value="Send">
</form>
</div>
</body>
</html>
