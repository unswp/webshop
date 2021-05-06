<?php
// Getting requested data
$name = $_POST['name'];
$message = $_POST['message'];
// Including message thread file
$file = 'thread';
$content = file_get_contents($file);
// Setting current timezone as UTC
date_default_timezone_set('UTC');
// Getting current entity date and time format
$format = file_get_contents('format');
$date = date($format);
// Forming string to append
$append = $content.$name.': '.$message.' | '.$date.'
';
// Checking if entity sending message exists
if (file_exists($name)) {
    // Checking entity rating
    $rating = file_get_contents($name.'/rating');
    if ($rating < 0) {
        // Entity is considered banned, cancelled, dead or inactive if it cannot do everything in any entity it exists. For that reason, user cannot even send messages using entity with negative rating.
    } else {
        // Saving thread with data appended by users
        file_put_contents($file, $append);
        chmod($file, 0777);
    }
} else {
  // ERROR! Requested entity does not exist in this directory
}
