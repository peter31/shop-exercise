<?php

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>Users</title>";
echo "</head>";
echo "<body>";
echo "<form  action='/admin/users/add_action' method='POST'>";
echo "<input  style='display: block' type='text' name='user' placeholder='username' required/>";
echo "<input style='display: block' type='email' name='email' placeholder='name@mail.com' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required/>";
echo "<button>Add</button>";
echo "</form>";
echo "<p>Powered by Peter</p>";
echo "</body>";
echo "</html>";

