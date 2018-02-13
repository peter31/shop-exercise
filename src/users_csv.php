<?php

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>Users</title>";
echo "</head>";
echo "<body>";
echo "<form enctype='multipart/form-data' action='/admin/users/csv_action' method='POST'>";
echo "<input name='file' type='file'/>";
echo "<input type='submit' name='Check' value='Send'/>";
echo "</form>";
echo "</body>";
echo "</html>";

echo "<p>Powered by Peter</p>";