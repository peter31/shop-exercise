<?php

require dirname(dirname(__DIR__)) . '/functions.php';

$accesDB = openDB();
$sqlQuery = 'SELECT * FROM users';
$sqlData = mysqli_query($accesDB, $sqlQuery);

mysqli_close($accesDB);

require dirname(dirname(__DIR__)) . '/templates/users/list.php';
