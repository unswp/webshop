<?php
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*.pkg')));
if (file_exists('noedit')) {} else {
?>
<html>
<head>
<link rel="shortcut icon" href="package.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Installed Packages</title>
<link rel="stylesheet" type="text/css" href="style.css?rev=<?=time();?>">
<?php include 'top.php'; ?>
<script>
function remove(pkg) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       document.location.reload();
    }
  }
  xmlhttp.open("POST","remove.php?pkg="+pkg,true);
  xmlhttp.send();
}
function info(pkg) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       xmlhttp.open("POST","pkginfo.php?pkg="+pkg,true);
       xmlhttp.send();
    }
  }
  window.location.href = "pkginfo.php?pkg="+pkg;
}
</script>
</head>
<?php include 'panel.php'; ?>
<div class='window'>
<table id="table" width="100%">
<thead>
<tr>
<th>Package ID</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach ($list as $key=>$value) { ?>
    <tr>
    <td>
    <a href="package.png">
    <img class=hover width=48px height=48px src="package.png?rev=<?=time();?>">
    </a>
    <?php
    $pkgname = str_replace('.pkg', '', $value);
    echo $pkgname;
    ?>
    </td>
    <td>
    <input id='removeButton' class='south' name="<?=$pkgname;?>" type="<?php
    if (file_exists($pkgname.'.lock')) {
        $showmode = "hidden";
    } else {
        $showmode = "button";
    }
    echo $showmode;
    ?>" value="-" onclick="remove(this.name);window.location.reload();" style="width:32px;">
     <input id='infoButton' class='west' name="<?=$pkgname;?>" type="button" value="i" onclick="info(this.name);" style="width:32px;">
    </td>
    </tr>
<?php } ?>
</tbody>
</table>
</tbody>
</table>
</div>
</body>
</html>
<?php } ?>
