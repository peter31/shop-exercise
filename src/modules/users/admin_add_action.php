<?php

require dirname(dirname(__DIR__)) . '/functions.php';

$user = $_POST["user"];
$email = $_POST["email"];

$sqlQuery = 'SELECT * FROM users WHERE email = "' . $email . '"';
$addUser = 'INSERT INTO users SET name = "' . $user . '", email = "' . $email . '"';
$updateUser = 'UPDATE users SET name = "' . $user . '" WHERE email = "' . $email . '"';
$accessDB = openDB();

if (mysqli_fetch_row(mysqli_query($accessDB, $sqlQuery)) === NULL) {
    mysqli_query($accessDB, $addUser);
    $userResultString = 'User is added';
} else {
    mysqli_query($accessDB, $updateUser);
    $userResultString = 'User is updated';
}
mysqli_close($accessDB);

include dirname(dirname(__DIR__)) . '/templates/users/add_action.php';
