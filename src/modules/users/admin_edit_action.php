<?php

require_once dirname(dirname(__DIR__)) . '/functions.php';

$errors = userAddValidation($_POST);

if (count($errors) > 0) {

    include dirname(dirname(__DIR__)) . '/templates/users/add.php';

} else {

    $id = $_POST['id'];
    $user = $_POST['user'];
    $email = $_POST['email'];

    $accessDB = openDB();

    $editUser = 'UPDATE users SET name = "' . mysqli_real_escape_string($accessDB, $user) . '", email = "' . mysqli_real_escape_string($accessDB, $email) . '" WHERE id = "' . $id . '"';

    mysqli_query($accessDB, $editUser);

    mysqli_close($accessDB);

    $userResultString = 'User was changed';

    include dirname(dirname(__DIR__)) . '/templates/users/add_action.php';
}