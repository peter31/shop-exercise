<?php

require dirname(dirname(__DIR__)) . '/functions.php';

$id = ($_GET['id']);

$accessDB = openDB();
$sqlQuery = 'SELECT * FROM users WHERE id = "' . $id . '"';
$sqlData = mysqli_query($accessDB, $sqlQuery);
$user = mysqli_fetch_assoc($sqlData);
mysqli_close($accessDB);

$name = $user['name'];
$email = $user['email'];

include dirname(dirname(__DIR__)) . '/templates/users/edit.php';