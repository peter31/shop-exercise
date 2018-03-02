<?php

require_once dirname(dirname(__DIR__)) . '/functions.php';

$errors = userAddValidation($_POST);

$accessDB = openDB();

if (!empty($_POST['email'])) {

    $sqlQuery = 'SELECT * FROM users WHERE email = "' . mysqli_real_escape_string($accessDB, $_POST['email']) . '"';

    if (mysqli_fetch_row(mysqli_query($accessDB, $sqlQuery)) !== NULL) {
        $errors[] = 'User with this email already exists';
    }
}

if (count($errors) > 0) {

    include dirname(dirname(__DIR__)) . '/templates/users/add.php';

} else {

    $user  = $_POST['user'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $addUser =
        'INSERT INTO users SET
         name = "' . mysqli_real_escape_string($accessDB, $user) . '",
         email = "' . mysqli_real_escape_string($accessDB, $email) . '",
         password = "' . mysqli_real_escape_string($accessDB, $pass) . '"';

    mysqli_query($accessDB, $addUser);
    $userResultString = 'User is added';

    include dirname(dirname(__DIR__)) . '/templates/users/add_action.php';
}

mysqli_close($accessDB);