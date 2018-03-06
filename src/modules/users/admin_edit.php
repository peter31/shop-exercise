<?php

require dirname(__DIR__, 2) . '/functions.php';

$id = ($_GET['id']);

$accessDB = openDB();
$sqlQuery = 'SELECT * FROM users WHERE id = "' . mysqli_real_escape_string($accessDB, $id) . '"';
$user = mysqli_fetch_assoc(mysqli_query($accessDB, $sqlQuery));
mysqli_close($accessDB);

$id = $user['id'];
$name = $user['name'];
$email = $user['email'];
$password = $user['password'];
$status = $user['status'];

include dirname(__DIR__, 2) . '/templates/users/edit.php';