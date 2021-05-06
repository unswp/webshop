<?php
$category = $_POST['category'];
$value = $_POST['value'];
$values = $_POST['values'];
$range = $_POST['range'];
if (file_exists($category.'.def') && file_exists($category.'.sel') && file_exists($category.'.ran')) {
} else {
    file_put_contents($category.'.def', $value);
    chmod($category.'.def', 0777);
    file_put_contents($category.'.sel', $values);
    chmod($category.'.sel', 0777);
    file_put_contents($category.'.ran', $range);
    chmod($category.'.ran', 0777);
}
