<?php

require __DIR__ . '/functions.php';

$user = $_POST["user"];
$email = $_POST["email"];

$sqlQuery = 'SELECT * FROM users WHERE email = "' . $email . '"';
$addUser = 'INSERT INTO users SET name = "' . $user . '", email = "' . $email . '"';
$updateUser = 'UPDATE users SET name = "' . $user . '" WHERE email = "' . $email . '"';

if (mysqli_fetch_row(mysqli_query(openDB(), $sqlQuery)) === NULL) {
    mysqli_query(openDB(), $addUser);
    echo('User was added');
} else {
    mysqli_query(openDB(), $updateUser);
    echo('User was updated');
}
closeDB();

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>FIRST</title>";
echo "</head>";
echo "<body>";
echo "<p><a href='/admin/users/add'>Add another one user</a></p>";
echo "</body>";
echo "</html>";
