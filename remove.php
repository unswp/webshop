<?php
$pkg = $_REQUEST['pkg'];
$apps = file_get_contents('apps.list');
$list = file_get_contents($pkg.'.pkg');
$files = explode(";", $list);
foreach($files as $file) {
    if (strpos($file, '>') !== false) {
        $apps = str_replace($file.';', '', $apps);
    } else {
        chmod($file, 0777);
        unlink($file);
    }
}
file_put_contents('apps.list', $apps);
chmod('apps.list', 0777);
chmod($pkg.'.pkg', 0777);
unlink($pkg.'.pkg');
