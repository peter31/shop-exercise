<?php include dirname(dirname(__DIR__)) . '/templates/header.php' ?>
<p><a href='/admin/users/add'>Add user  through form</a></p>
<p><a href='/admin/users/csv'>Add user(s)  through sending CVS file</a></p>
<table border='1'><tr><th>id</th><th>name</th><th>email</th><th>status</th><th>created</th><th>updated</th></tr>
<?php
require dirname(dirname(__DIR__)) . '/functions.php';
$accesDB = openDB();
$sqlQuery = 'SELECT * FROM users';
$sqlData = mysqli_query($accesDB, $sqlQuery);
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
mysqli_close($accesDB);
require dirname(dirname(__DIR__)) . '/templates/footer.php'
?>