<?php

$users = [];
if($_POST['Check']) {
    if($_FILES['file']['name']) {
        $result = explode('.', $_FILES['file']['name']);
        if($result[1] == 'csv') {
            $take = fopen($_FILES['file']['tmp_name'], "r");
            while(($usersRow = fgetcsv($take)) !== FALSE) {
                $users[] = $usersRow;
            }
            fclose($take);
        }
    }
}

require dirname(dirname(__DIR__)) . '/functions.php';
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
