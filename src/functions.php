<?php

function openDB()
{
    require __DIR__ . '/config.php';
    return mysqli_connect($database['host'], $database['user'],  $database['pass'], $database['db']);
}


