<?php
$dir = '.';
$entity = basename(dirname(__FILE__));
$enttype = file_get_contents('type');
$rating = file_get_contents('rating');
$title = file_get_contents('name');
$description = file_get_contents('description');
$mode = file_get_contents('mode');
$system = file_get_contents('system');
$platform = file_get_contents('platform');
$version = file_get_contents('version');
$release = file_get_contents('release.txt');
$MetricUnits = file_get_contents('metric.list');
$ImperialUnits = file_get_contents('imperial.list');
$tooltips = str_replace($dir.'/','',(glob($dir.'/*.tt')));
$quotes = str_replace($dir.'/','',(glob($dir.'/*.q')));
$reldel = explode(' =//= ', $release);
if (file_exists('name')) {
    if (file_get_contents('name') != '') {
        $selftitle = $title;
    } else {
        $selftitle = $entity;
    }
} else {
    $selftitle = $entity;
}
if (file_exists('favicon.png')) {
    $selficon = 'favicon.png';
} else {
    $selficon = 'entity.png';
}
