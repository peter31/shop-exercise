<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $email = $_POST["email"];
}


require __DIR__ . '/config.php';

$db = mysqli_connect($database['host'], $database['user'],  $database['pass'], $database['db']);

$query = 'SELECT * FROM users WHERE email = "' . $email . '"';
$insert = 'INSERT INTO users SET name = "' . $user . '", email = "' . $email . '"';
$update = 'UPDATE users SET name = "' . $user . '" WHERE email = "' . $email . '"';

if (mysqli_fetch_row(mysqli_query($db, $query)) === NULL) {
    $added++;
    mysqli_query($db, $insert);
    echo('User was added');
} else {
    mysqli_query($db, $update);
    echo('User was updated');
}

mysqli_close($db);

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>Users</title>";
echo "</head>";
echo "<body>";
echo "<p>Powered by Peter</p>";
echo "</body>";
echo "</html>";

