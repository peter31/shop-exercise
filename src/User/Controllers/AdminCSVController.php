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

        $total = count($users);
        $added = 0;
        $updated = 0;

        foreach ($users as $key => $value) {

            $mysql = connectDB();

            $sqlQuery = sprintf(
                'SELECT * FROM users WHERE email = "%s"',
                $mysql->escape_string($value[1])
            );

            $addUser = sprintf(
                'INSERT INTO users SET name = "%s", email = "%s"',
                $mysql->escape_string($value[0]),
                $mysql->escape_string($value[1])
            );

            $updateUser = sprintf(
                'UPDATE users SET name = "%s" WHERE email = "%s"',
                $mysql->escape_string($value[0]),
                $mysql->escape_string($value[1])
            );

            $result = $mysql->query($sqlQuery);

            if ($result->num_rows === 0) {
                $mysql->query($addUser);
            } else {
                $mysql->query($updateUser);
                $updated++;
            }
            $mysql->close();
        }
        include dirname(__DIR__) . '/Templates/csv_action.php';
    }
}