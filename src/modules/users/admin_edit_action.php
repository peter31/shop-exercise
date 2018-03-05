<?php

error_reporting(E_ALL & ~E_STRICT);
ini_set('display_errors', 1);

require_once dirname(dirname(__DIR__)) . '/functions.php';

$errors = userAddValidation($_POST);

$accessDB = openDB();

if (empty($_POST['id'])) {
    $errors[] = 'ID is empty';
} else {

    $sqlQuery = 'SELECT * FROM users WHERE id = "' . mysqli_real_escape_string($accessDB, $_POST['id']) . '"';

    if (mysqli_fetch_row(mysqli_query($accessDB, $sqlQuery)) === NULL) {
        $errors[] = 'User with this id does not exist';
    }
}

if (count($errors) > 0) {

    include dirname(dirname(__DIR__)) . '/templates/users/add.php';

} else {

    $id = $_POST['id'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    $editUser =
        'UPDATE users SET
         name = "' . mysqli_real_escape_string($accessDB, $user) . '",
         email = "' . mysqli_real_escape_string($accessDB, $email) . '",
         status = "' . mysqli_real_escape_string($accessDB, $status) . '"
         WHERE id = "' . $id . '"';

    mysqli_query($accessDB, $editUser);

    $userResultString = 'User was changed';

    include dirname(dirname(__DIR__)) . '/templates/users/add_action.php';
}

mysqli_close($accessDB);