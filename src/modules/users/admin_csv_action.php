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
    $query = 'SELECT * FROM users WHERE email = "' . $email . '"';
    $insert = 'INSERT INTO users SET name = "' . $name . '", email = "' . $email . '"';
    $update = 'UPDATE users SET name = "' . $name . '" WHERE email = "' . $email . '"';
    if (mysqli_fetch_row(mysqli_query($accessDB, $query)) === NULL) {
        $added++;
        mysqli_query($accessDB, $insert);
    } else {
        mysqli_query($accessDB, $update);
        $updated++;
    }
}
mysqli_close($accessDB);

include dirname(dirname(__DIR__)) . '/header.php';
