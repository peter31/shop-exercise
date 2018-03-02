<?php

require dirname(dirname(__DIR__)) . '/functions.php';

$id = ($_GET['id']);

$accessDB = openDB();
$sqlQuery = 'SELECT * FROM users WHERE id = "' . $id . '"';
$sqlData = mysqli_query($accessDB, $sqlQuery);
$userData = mysqli_fetch_assoc($sqlData);
mysqli_close($accessDB);

$user = $userData['name'];
$email = $userData['email'];
$password = $userData['password'];
$status = $userData['status'];
$list = $userData['list'];
$aform = $userData['aform'];
$eform = $userData['eform'];



include dirname(dirname(__DIR__)) . '/templates/users/edit.php';