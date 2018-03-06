<?php

function openDB()
{
    require __DIR__ . '/config.php';
    return mysqli_connect($database['host'], $database['user'],  $database['pass'], $database['db_name']);
}

function userAddValidation($arr)
{
    $errors = [];

    if (empty($arr['name']) || empty($arr['email']) || empty($arr['password'])) {
        $errors[] = 'All fields must be completed';
    } else {
        if (filter_var($arr['email'], FILTER_VALIDATE_EMAIL) === FALSE) {
            $errors[] = 'Is not a valid email address';
        }
    }

    return $errors;

}

function advertAddValidation($arr)
{
    $errors = [];

    if ( empty($arr['title']) || empty($arr['message']) || empty($arr['phone']) ) {
        $errors[] = 'All fields must be completed';
    }

    return $errors;

}
