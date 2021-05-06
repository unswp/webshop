<?php
$dir = '.';
$quotes = str_replace($dir.'/','',(glob($dir.'/*.q')));
if (file_exists('noedit')) { ?>
<html>
<head>
<link rel="shortcut icon" href="menu.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Unlock This Entity</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script>
function unlock() {
  var password = document.getElementById("pass").value;
  var dataString = 'password=' + password;
  $.ajax({
    type: "POST",
    url: "lock.php",
    data: dataString,
    cache: false,
    success: function(html) {
        window.location.href = 'menu.php';
    }
  });
  return false;
}
</script>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<h1 align=center>
<img class='hover' style="height:64px;" src='security.png?rev=<?=time();?>'>
Unlock This Entity</h1>
<p align=center>
<label>Enter password: </label>
<input class="text" type='password' placeholder="Type the password" id="pass" style="width:295px;" value="" onkeydown="if (event.keyCode == 13) { unlock(); }">
<input class="east" id="unlock" onclick="unlock();" type="button" value=">">
</p>
</div>
</body>
</html>
<?php } else {
include 'gather.php';
?>
<html>
<head>
<link rel="shortcut icon" href="menu.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Main Menu</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<p>
<a href="stats.php">
<img title="Stats" class=hover style="width:10%;" src="stats.png?rev=<?=time();?>"></a>
<a href="register.php">
<img title="Register" class=hover style="width:10%;" src="register.png?rev=<?=time();?>"></a>
<a href="settings.php">
<img title="Settings" class=hover style="width:10%;" src="settings.png?rev=<?=time();?>"></a>
<a href="info.php">
<img title="Entity Info" class=hover style="width:10%;" src="info.png?rev=<?=time();?>"></a>
<a href="order.php">
<img title="Get New Packages" class=hover style="width:10%;" src="web.png?rev=<?=time();?>"></a>
<a href="update.php">
<img title="Webshop Update" class=hover style="width:10%;" src="update.png?rev=<?=time();?>"></a>
<a href="pacman.php">
<img title="Installed Packages" class=hover style="width:10%;" src="package.png?rev=<?=time();?>"></a>
<a href="software.php">
<img title="Applications" class=hover style="width:10%;" src="apps.png?rev=<?=time();?>"></a>
<a href="misc.php">
<img title="Miscellaneous" class=hover style="width:10%;" src="misc.png?rev=<?=time();?>"></a>
</p>
<h1>
<img class=hover style="width:12%;" src=
<?php
if (file_exists('favicon.png')) {
    $icon = 'favicon.png';
} else {
    $icon = 'entity.png';
}
echo $icon;
?>?rev=<?=time();?> onclick="window.location.href='<?=$icon;?>'">
<img class=hover style="width:12%;" src=
<?php
if ($rating < 0) {
    $icon = 'cancelled.png';
    $ratitle = 'Cancelled';
} else {
    $icon = 'approved.png';
    $ratitle = 'Approved';
}
echo $icon;
?>?rev=<?=time();?> title="<?=$ratitle;?>" onclick="window.location.href='<?=$icon;?>'">
<?=$name;?>
</h1>
<p>
<?=$description;?>
</p>
<p>
<?php
$count = count($quotes);
if (file_exists(rand(1,$count).'.q')) {
    echo file_get_contents(rand(1,$count).'.q');
} else {
    echo "";
}
?>
</p>
</div>
</body>
</html>
<?php } ?>
