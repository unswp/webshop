<?php
$id = $_REQUEST['id'];
?>
<html>
<head>
<link rel="shortcut icon" href="console.png?rev=<?=time();?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Poll Info</title>
<link rel="stylesheet" type="text/css" href="console.css?rev=<?=time();?>">
</head>
<body>
<?='Webshop Console started';?>;
<br>
<?='Obtaining '.$id.' poll information...';?>
<p></p>
<?php
$value = $id;
echo 'Category: '.$value;
?>
<br>
<?php
$value = file_get_contents($id.'.def');
echo 'Value: '.$value;
?>
<br>
<?php
$options = file_get_contents($id.'.sel');
echo 'List: '.$options;
?>
<br>
<?php
$range = file_get_contents($id.'.ran');
echo 'Range: '.$range;
?>
</body>
</html>
