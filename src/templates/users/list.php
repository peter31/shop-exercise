<?php

include dirname(__DIR__) . '/header.php';

echo "<p><a href='/admin/users/add'>Add user  through form</a></p>";
echo "<p><a href='/admin/users/csv'>Add user(s)  through sending CVS file</a></p>";
echo "<table border='1'><tr><th>id</th><th>name</th><th>email</th><th>status</th><th>created</th><th>updated</th></tr>";

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

require dirname(__DIR__) . '/footer.php';
