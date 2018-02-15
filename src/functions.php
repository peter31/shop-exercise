<?php

function openDB()
{
    require __DIR__ . '/config.php';
    $db = mysqli_connect($database['host'], $database['user'],  $database['pass'], $database['db']);
    return $db;
}

function closeDB()
{
    mysqli_close(openDB());
}

function sqlQuery($var)
{
    mysqli_query($db, $var);
}

