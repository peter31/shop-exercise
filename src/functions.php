<?php

function openDB()
{
    require __DIR__ . '/config.php';
    return mysqli_connect($database['host'], $database['user'],  $database['pass'], $database['db']);
}

function dataValidation($arr)
{
    $errArr = [];

    if (empty($arr['user']) || empty($arr['email'])) {
        $errArr[] = 'All fields must be completed';
    }

    if (preg_match("/[a-zA-Z ]/", $arr['user']) === 0) {
        $errArr[] = 'Name must be from letters and spaces';
    }

    if (filter_var($arr['email'], FILTER_VALIDATE_EMAIL) === FALSE) {
        $errArr[] = 'Is not a valid email address';
    }
    return $errArr;
}
