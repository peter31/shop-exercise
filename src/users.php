<?php

require __DIR__ . '/functions.php';

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>FIRST</title>";
echo "</head>";
echo "<body>";
echo "<p><a href='/admin/users/add'>Add user  through form</a></p>";
echo "<p><a href='/admin/users/csv'>Add user(s)  through sending CVS file</a></p>";
echo "<table border='1'>";
echo "<tr><th>id</th><th>name</th><th>email</th><th>status</th><th>created</th><th>updated</th></tr>";

$sqlQuery = 'SELECT * FROM users';
$sqlData = mysqli_query(openDB(), $sqlQuery);

while ($users = mysqli_fetch_assoc($sqlData)) {
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

closeDB();

echo "<p>Powered by Peter</p>";
echo "</body>";
echo "</html>";
