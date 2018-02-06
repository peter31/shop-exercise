<?php

$user = '';
$email = '';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $email = $_POST["email"];
}


require __DIR__ . '/config.php';

$db = mysqli_connect($database['host'], $database['user'],  $database['pass'], $database['db']);

$query = 'SELECT * FROM users WHERE email = "' . $email . '"';
$insert = 'INSERT INTO users SET name = "' . $name . '", email = "' . $email . '"';
$update = 'UPDATE users SET name = "' . $name . '" WHERE email = "' . $email . '"';

if (mysqli_fetch_row(mysqli_query($db, $query)) === NULL) {
    $added++;
    mysqli_query($db, $insert);
    echo('User was added');
} else {
    mysqli_query($db, $update);
    echo('User was updated');
}

mysqli_close($db);