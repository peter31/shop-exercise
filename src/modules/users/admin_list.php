<?php

require dirname(dirname(__DIR__)) . '/functions.php';

$accessDB = openDB();
$sqlQuery = 'SELECT * FROM users';
$sqlData = mysqli_query($accessDB, $sqlQuery);

$users = [];
while ($user = mysqli_fetch_assoc($sqlData)) {
    $users[] = $user;
}

mysqli_close($accessDB);

require dirname(dirname(__DIR__)) . '/templates/users/list.php';
