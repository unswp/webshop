<?php
$name = $_REQUEST['name'];
$mode = strtolower(file_get_contents('mode'));
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Font Preview</title>
<link rel="shortcut icon" href="font.png?rev=<?=time();?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?=$mode.'.css';?>?rev=<?=time();?>">
<style>
@font-face {
  font-family: "User Define";
  src: url("<?=$name;?>");
}
.userDefine {
  font-family: "User Define";
  font-size: 16pt;
}
</style>
</head>
<body>
<p class='userDefine'>
0 1 2 3 4 5 6 7 8 9
. , ! ? : ; ' " ` ~ - + * / \ | ( ) [ ] < > { } @ # $ % ^ & _
A B C D E F G H I J K L M N O P Q R S T U V W X Y Z
a b c d e f g h i j k l m n o p q r s t u v w x y z
Α Β Γ Δ Ε Ζ Η Θ Ι Κ Λ Μ Ν Ξ Ο Π Ρ Σ Τ Υ Φ Χ Ψ Ω
α β γ δ ε ζ η θ ι κ λ μ ν ξ ο π ρ σ ς τ υ φ χ ψ ω
А Б В Г Д Е Ё Ж З И Й К Л М Н О П Р С Т У Ф Х Ц Ч Ш Щ Ъ Ы Ь Э Ю Я
а б в г д е ё ж з и й к л м н о п р с т у ф х ц ч ш щ ъ ы ь э ю я
</p>
</body>
</html>
