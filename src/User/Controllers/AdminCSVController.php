<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;

class AdminCSVController extends AdminAbstractController
{
    public function getCSV()
    {
        if (array_key_exists('saved_data', $_SESSION)) {
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        include dirname(__DIR__) . '/Resources/templates/admin/csv.php';
    }

    public function actionCSV()
    {
        if (count($errors = $this->fileErrors($_FILES))) {
            $_SESSION['saved_data']['errors'] = $errors;
            $this->redirect('/admin/users/csv');
        } else {
            $take = fopen($_FILES['browse_csv']['tmp_name'], 'rb');
            $incorrect = 0;
            while (($usersRow = fgetcsv($take)) !== false) {
                    $validationErrors = $this->validationErrors(['name' => $usersRow[0], 'email' => $usersRow[1]]);
                    if (!count($validationErrors)) {
                        $users[] = $usersRow;
                    } else {
                        $incorrect++;
                    }
                }
                fclose($take);
            }

        $total = count($users);

        $added = 0;
        $updated = 0;


        foreach ($users as $key => $value) {

            $sqlQuery = sprintf('SELECT * FROM users WHERE email = "%s"', $this->mysql->escape_string($value[1]));
            $result   = $this->mysql->query($sqlQuery);

            if ($result->num_rows === 0) {
                $addUser  = sprintf('INSERT INTO users SET name = "%s", email = "%s"', $this->mysql->escape_string($value[0]), $this->mysql->escape_string($value[1]));
                $this->mysql->query($addUser);
                $added = $this->mysql->affected_rows;
            } else {
                $updateUser = sprintf( 'UPDATE users SET name = "%s" WHERE email = "%s"', $this->mysql->escape_string($value[0]), $this->mysql->escape_string($value[1]));
                $this->mysql->query($updateUser);
                $updated = $this->mysql->affected_rows;
            }
        }

        include dirname(__DIR__) . '/Resources/templates/admin/csv_action.php';
    }

    private function validationErrors($arr)
    {
        $errors = [];

        if (empty($arr['name']) || empty($arr['email'])) {
            $errors[] = 'All fields must be completed';
        } else {
            if (filter_var($arr['email'], FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = 'Is not a valid email address';
            }
        }
       return $errors;
    }


    private function fileErrors($arr)
    {
        $file_errors = [];

        if (!array_key_exists('browse_csv', $arr) && !$arr['browse_csv']['name']) {
            $file_errors[] = 'File is not selected !';
        } else {
            list(, $file_format) = explode('.', $arr['browse_csv']['name']);
            if ($file_format !== 'csv') {
                $file_errors[] = 'File is not csv !';
            }
        }
        return $file_errors;
    }
}

