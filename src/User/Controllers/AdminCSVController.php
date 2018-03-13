<?php
namespace User\Controllers;

class AdminCSVController
{
    public function getCSV()
    {
        include dirname(__DIR__) . '/Templates/csv.php';
    }

    public function sendCSV()
    {
        $users = [];
        if (array_key_exists('browse_csv', $_FILES)) {
            $result = explode('.', $_FILES['browse_csv']['name']);
            if ($result[1] === 'csv') {
                $take = fopen($_FILES['browse_csv']['tmp_name'], 'rb');
                while (($usersRow = fgetcsv($take)) !== false) {
                    $errors = checkCSV(['name' => $usersRow[0], 'email' => $usersRow[1]]);
                    if (!count($errors)) {
                        $users[] = $usersRow;
                    }
                }
                fclose($take);
            }
        }

        $added = 0;
        $updated = 0;
        $total = 0;

        foreach ($users as $key => $value) {
            $total++;
            $sqlQuery = 'SELECT * FROM users WHERE email = "' . mysqli_real_escape_string(connectDB(), $value[1]) . '"';
            $addUser = 'INSERT INTO users SET name = "' . mysqli_real_escape_string(connectDB(), $value[0]) . '", email = "' . mysqli_real_escape_string(connectDB(), $value[1]) . '"';
            $updateUser = 'UPDATE users SET name = "' . mysqli_real_escape_string(connectDB(), $value[0]) . '" WHERE email = "' . mysqli_real_escape_string(connectDB(), $value[1]) . '"';
            if (mysqli_fetch_row(mysqli_query(connectDB(), $sqlQuery)) === NULL) {
                $added++;
                mysqli_query(connectDB(), $addUser);
            } else {
                mysqli_query(connectDB(), $updateUser);
                $updated++;
            }
        }
        mysqli_close(connectDB());

        include dirname(__DIR__) . '/Templates/csv_action.php';
    }
}