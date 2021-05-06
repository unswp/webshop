<?php
$dir = '.';
if (file_exists('noedit')) {} else {
    $csslist = str_replace($dir.'/','',(glob($dir.'/*.css')));
    $iconlist = str_replace($dir.'/','',(glob($dir.'/*.png')));
    foreach($csslist as $key=>$value) {
        $basename = basename($value, '.css');
        if (file_exists($basename.'.'.$guitheme.'.css')) {
            copy($basename.'.'.$guitheme.'.css', $basename.'.css');
            chmod($basename.'.css', 0777);
        } else {
            chmod($basename.'.css', 0777);
        }
    }
    foreach($iconlist as $key=>$value) {
        $basename = basename($value, '.png');
        if (file_exists($basename.'.'.$icontheme.'.png')) {
            copy($basename.'.'.$icontheme.'.png', $basename.'.png');
            chmod($basename.'.png', 0777);
        } else {
            chmod($basename.'.png', 0777);
        }
    }
    file_put_contents('back.thm', $backimage);
    chmod('back.thm', 0777);
    file_put_contents('gui.thm', $guitheme);
    chmod('gui.thm', 0777);
    file_put_contents('icons.thm', $icontheme);
    chmod('icons.thm', 0777);
    file_put_contents('icon.thm', $favicon);
    chmod('icon.thm', 0777);
    if ($favicon != '') {
        if (file_exists($favicon.'.png')) {
            copy($favicon.'.png', 'favicon.png');
            chmod('favicon.png', 0777);
        }
    }
}
