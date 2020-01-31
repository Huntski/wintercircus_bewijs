<?php

$request = (isset($_GET['request'])) ? filter_var($_GET['request'], FILTER_SANITIZE_STRING) : '';
$file_name = 'check.json';
$file = json_decode(file_get_contents($file_name), true);
$status = $file['bool'];

if ($request === 'run') {
    $file['bool'] = 'true';
    file_put_contents($file_name, json_encode($file));
    $status = 'true';
}

if ($request === 'reset') {
    $file['bool'] = 'false';
    file_put_contents($file_name, json_encode($file));
    $status = 'false';
}

echo $status;