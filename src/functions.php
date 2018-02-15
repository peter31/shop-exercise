<?php

function openDB()
{
    require __DIR__ . '/config.php';
    return mysqli_connect($database['host'], $database['user'],  $database['pass'], $database['db']);
}

function sqlQuery($var)
{
    mysqli_query($db, $var);
}

