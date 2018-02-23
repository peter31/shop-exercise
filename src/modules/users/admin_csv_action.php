<?php

require_once dirname(dirname(__DIR__)) . '/functions.php';

//var_dump($_FILES);die;

$users = [];
if (array_key_exists('browse_csv', $_FILES)) {
    $result = explode('.', $_FILES['browse_csv']['name']);
    if ($result[1] === 'csv') {
        $take = fopen($_FILES['browse_csv']['tmp_name'], "rb");
        while (($usersRow = fgetcsv($take)) !== false) {
            $errors = userAddValidation(
                ['user' => $usersRow[0], 'email' => $usersRow[1]]
            );

            if (!count($errors)) {
                $users[] = $usersRow;
            }
        }
        fclose($take);
    }
}

$accessDB = openDB();

$added = 0;
$updated = 0;
$total = 0;

foreach ($users as $key => $value) {
    $total++;
    $name = $value[0];
    $email = $value[1];
    $sqlQuery = 'SELECT * FROM users WHERE email = "' . $email . '"';
    $addUser = 'INSERT INTO users SET name = "' . $name . '", email = "' . $email . '"';
    $updateUser = 'UPDATE users SET name = "' . $name . '" WHERE email = "' . $email . '"';
    if (mysqli_fetch_row(mysqli_query($accessDB, $sqlQuery)) === NULL) {
        $added++;
        mysqli_query($accessDB, $addUser);
    } else {
        mysqli_query($accessDB, $updateUser);
        $updated++;
    }
}
mysqli_close($accessDB);

include dirname(dirname(__DIR__)) . '/templates/users/csv_action.php';
