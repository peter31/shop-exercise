<?php

function openDB()
{
    require __DIR__ . '/config.php';
    return mysqli_connect($database['host'], $database['user'],  $database['pass'], $database['db']);
}

function userAddValidation(array $params): array
{
    $errors = [];

    if (empty($params['user']) || empty($params['email'])) {
        $errors[] = 'All fields must be filled';
    } else {
        if (preg_match("/[a-zA-Z ]/", $params['user']) === 0) {
            $errors[] = 'Name must be from letters and spaces';
        }

        if (filter_var($params['email'], FILTER_VALIDATE_EMAIL) === FALSE) {
            $errors[] = 'Is not a valid email address';
        }
    }

    return $errors;
}
