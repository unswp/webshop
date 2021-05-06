<?php
// Getting request for link creation
$string = $_REQUEST['str'];
// Getting data from file
$explode = explode(">", $string);
$name = $explode[0];
$description = $explode[1];
$uri = $explode[2];
// Generating link filename
$filename = $name.'.uri';
// Writing content to URL file
$content = $description.'>'.$uri;
// Saving link file
file_put_contents($filename, $content);
chmod($filename, 0777);
