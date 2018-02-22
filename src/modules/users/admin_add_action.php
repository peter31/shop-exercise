<?php

require dirname(dirname(__DIR__)) . '/functions.php';

$user = $_POST["user"];
$email = $_POST["email"];

if (empty($user) || empty($email)) {
    die('All fields must be completed');
}

if (preg_match("/[a-zA-Z ]/", $user) === 0) {
    die('Name must be from letters and spaces');
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    die('Is not a valid email address');
}

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
