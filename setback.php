<?php
$back = $_REQUEST['back'];
if (file_exists('noedit')) {} else {
    file_put_contents('back.thm', $back);
    chmod('back.thm', 0777);
}
