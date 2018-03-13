<?php

function connectDB() {
    require dirname(__DIR__, 2) . '/config.php';
    return mysqli_connect($db['host'], $db['user'],  $db['pass'], $db['name']);
}

function userAddValidation($arr) {
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

function checkCSV($arr) {
    $errors = [];

    if (empty($arr['name']) || empty($arr['email'])) {
        $errors[] = 'All fields must be completed';
    } else {
        if (filter_var($arr['email'], FILTER_VALIDATE_EMAIL) === FALSE) {
            $errors[] = 'Is not a valid email address';
        }
    }

    return $errors;

}
function advertAddValidation($arr) {
    $errors = [];

    if ( empty($arr['title']) || empty($arr['message']) || empty($arr['phone']) ) {
        $errors[] = 'All fields must be completed';
    }

    return $errors;
}

function autoload($className) {
    $classArr = explode('\\', $className);
    $path = dirname(__DIR__, 2) . '/src/' . implode('/', $classArr) . '.php';
    require_once $path;
}