<?php

require_once dirname(dirname(__DIR__)) . '/functions.php';

$user = $_POST["user"];
$email = $_POST["email"];

$sqlQuery = 'SELECT * FROM users WHERE email = "' . $email . '"';
$addUser = 'INSERT INTO users SET name = "' . $user . '", email = "' . $email . '"';
$updateUser = 'UPDATE users SET name = "' . $user . '" WHERE email = "' . $email . '"';

if (mysqli_fetch_row(mysqli_query(openDB(), $sqlQuery)) === NULL) {
    mysqli_query(openDB(), $addUser);
    $userResultString = 'User is added';
} else {
    mysqli_query(openDB(), $updateUser);
    $userResultString = 'User is updated';
}
mysqli_close($db);

include dirname(dirname(__DIR__)) . "/templates/users/add_form_action.php";

