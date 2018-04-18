<?php
namespace User\Controllers;
use Common\Controllers\AdminAbstractController;

class AdminCSVController extends AdminAbstractController
{
    public function getCSV()
    {
        include dirname(__DIR__) . '/Resources/templates/admin/csv.php';
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

            $sqlQuery = sprintf(
                'SELECT * FROM users WHERE email = "%s"',
                $this->mysql->escape_string($value[1])
            );

            $addUser = sprintf(
                'INSERT INTO users SET name = "%s", email = "%s"',
                $this->mysql->escape_string($value[0]),
                $this->mysql->escape_string($value[1])
            );

            $updateUser = sprintf(
                'UPDATE users SET name = "%s" WHERE email = "%s"',
                $this->mysql->escape_string($value[0]),
                $this->mysql->escape_string($value[1])
            );

            $result = $this->mysql->query($sqlQuery);

            if ($result->num_rows === 0) {
                $this->mysql->query($addUser);
            } else {
                $this->mysql->query($updateUser);
                $updated++;
            }
        }
        include dirname(__DIR__) . '/Resources/templates/admin/csv_action.php';
    }
}