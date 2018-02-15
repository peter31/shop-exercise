<?php

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>FIRST</title>";
echo "</head>";
echo "<body>";
echo "<form  action='/admin/users/add_action' method='POST'>";
echo "<input  style='display: block' type='text' name='user' placeholder='user' required/>";
echo "<input style='display: block' type='email' name='email' placeholder='example@mail.com' required/>";
echo "<button>Add</button>";
echo "</form>";
echo "<p>powered by Peter</p>";
echo "</body>";
echo "</html>";
