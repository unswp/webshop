<?php
$swsys = file_get_contents('system');
if ($swsys == 'Metric') {
    $spunit = 'm';
    $mnunit = 'eur';
} elseif ($swsys == 'Imperial') {
    $spunit = 'ft';
    $mnunit = 'usd';
}
if (file_exists('noedit')) {} else {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $format = $_POST['format'];
    $props = $_POST['props'];
    $welcome = $_POST['welcome'];
    $worth = $_POST['worth'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $z = $_POST['z'];
    $ammo = $_POST['ammo'];
    $heal = $_POST['heal'];
    $sups = $_POST['sups'];
    $spec = $_POST['spec'];
    $image = $_POST['image'];
    $audio = $_POST['audio'];
    $video = $_POST['video'];
    file_put_contents('name', $name);
    chmod('name', 0777);
    file_put_contents('type', $type);
    chmod('type', 0777);
    file_put_contents('description', $description);
    chmod('description', 0777);
    file_put_contents('format', $format);
    chmod('format', 0777);
    file_put_contents('info.list', $props);
    chmod('info.list', 0777);
    file_put_contents('welcome', $welcome);
    chmod('welcome', 0777);
    file_put_contents('worth.'.$mnunit, $worth);
    chmod('worth.'.$mnunit, 0777);
    file_put_contents('x.'.$spunit, $x);
    chmod('x.'.$spunit, 0777);
    file_put_contents('y.'.$spunit, $y);
    chmod('y.'.$spunit, 0777);
    file_put_contents('z.'.$spunit, $z);
    chmod('z.'.$spunit, 0777);
    file_put_contents('ammo.spare', $ammo);
    chmod('ammo.spare', 0777);
    file_put_contents('heal.spare', $heal);
    chmod('heal.spare', 0777);
    file_put_contents('sups.spare', $sups);
    chmod('sups.spare', 0777);
    file_put_contents('spec.spare', $spec);
    chmod('spec.spare', 0777);
    file_put_contents('images.index', $image);
    chmod('images.index', 0777);
    file_put_contents('audio.index', $audio);
    chmod('audio.index', 0777);
    file_put_contents('video.index', $video);
    chmod('video.index', 0777);
}
