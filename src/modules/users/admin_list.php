<?php

require dirname(__DIR__, 2) . '/functions.php';

$accessDB = openDB();
$sqlQuery = 'SELECT * FROM users';
$sqlData = mysqli_query($accessDB, $sqlQuery);

$users = [];
while ($user = mysqli_fetch_assoc($sqlData)) {
    $users[] = $user;
}

mysqli_close($accessDB);

require dirname(__DIR__, 2) . '/templates/users/list.php';
