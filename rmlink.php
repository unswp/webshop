<?php
// Getting request URI file
$filename = $_REQUEST['id'];
// Removing URI file
chmod($filename, 0777);
unlink($filename);
