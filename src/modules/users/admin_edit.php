<?php


var_dump($_POST);

//require_once dirname(dirname(__DIR__)) . '/functions.php';
//
//$errors = userAddValidation($_POST);
//
//if (count($errors) > 0) {
//
//    include dirname(dirname(__DIR__)) . '/templates/users/add.php';
//
//} else {
//
//    $email = $_POST['email'];
//    $user = $_POST['user'];
//
//    $accessDB = openDB();
//    $sqlQuery = 'SELECT * FROM users WHERE email = "' . $email . '"';
//    $addUser = 'INSERT INTO users SET name = "' . mysqli_real_escape_string($accessDB, $user) . '", email = "' . $email . '"';
//    $updateUser = 'UPDATE users SET name = "' . mysqli_real_escape_string($accessDB, $user) . '" WHERE email = "' . $email . '"';
//
//    if (mysqli_fetch_row(mysqli_query($accessDB, $sqlQuery)) === NULL) {
//        mysqli_query($accessDB, $addUser);
//        $userResultString = 'User is added';
//    } else {
//        mysqli_query($accessDB, $updateUser);
//        $userResultString = 'User is updated';
//    }
//
//    mysqli_close($accessDB);
//
//    include dirname(dirname(__DIR__)) . '/templates/users/add_action.php';
//
//}