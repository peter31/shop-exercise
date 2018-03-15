<?php
namespace User\Controllers;

class AdminAddController
{
    public function addForm()
    {
        include dirname(__DIR__) . '/Resources/templates/add.php';
    }

    public function addAction()
    {
        $errors = userAddValidation($_POST);
        $mysql = connectDB();

        if (!empty($_POST['email'])) {
            $sqlQuery = sprintf(
                'SELECT * FROM users WHERE email = "%s"',
                $mysql->escape_string($_POST['email'])
            );

            $result = $mysql->query($sqlQuery);

            if ($result->num_rows !== 0) {
                $errors[] = 'User with this email already exists';
            }
        }

        if (count($errors) > 0) {
            include dirname(__DIR__) . '/Resources/templates/add.php';
        } else {
            $sqlQuery = sprintf(
                'INSERT INTO users SET name = "%s", email = "%s", password = "%s"',
                $mysql->escape_string($_POST['name']),
                $mysql->escape_string($_POST['email']),
                $mysql->escape_string($_POST['password'])
            );
            $mysql->query($sqlQuery);

            $userResultString = 'User is added';

            include dirname(__DIR__) . '/Resources/templates/add_action.php';
        }
        $mysql->close();
    }
}