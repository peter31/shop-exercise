<?php

require dirname(dirname(__DIR__)) . '/functions.php';

$id = ($_GET['id']);

$accessDB = openDB();
$sqlQuery = 'SELECT * FROM users WHERE id = "' . mysqli_real_escape_string($accessDB, $id) . '"';
$sqlData = mysqli_fetch_assoc(mysqli_query($accessDB, $sqlQuery));
mysqli_close($accessDB);

$id = $sqlData['id'];
$user = $sqlData['name'];
$email = $sqlData['email'];
$password = $sqlData['password'];
$status = $sqlData['status'];

include dirname(dirname(__DIR__)) . '/templates/users/edit.php';