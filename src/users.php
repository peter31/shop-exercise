<?php

require __DIR__ . '/config.php';

$dbOpen = mysqli_connect($database['host'], $database['user'],  $database['pass'], $database['db']);
$sqlQuery = 'SELECT * FROM users';
$sqlData = mysqli_query($dbOpen, $sqlQuery);

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>id</th><th>name</th><th>email</th><th>status</th><th>created</th><th>updated</th></tr>";
while($users = mysqli_fetch_assoc($sqlData)) {
    echo "<tr><td>";
    echo $users['id'];
    echo "</td><td>";
    echo $users['name'];
    echo "</td><td>";
    echo $users['email'];
    echo "</td><td>";
    echo $users['status'];
    echo "</td><td>";
    echo $users['created'];
    echo "</td><td>";
    echo $users['updated'];
    echo "</td></tr>";
}
echo "</table>";

mysqli_close($dbOpen);