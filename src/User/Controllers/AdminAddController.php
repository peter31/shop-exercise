<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;

class AdminAddController extends AdminAbstractController
{
    public  function addForm()
    {
        if (array_key_exists('saved_data', $_SESSION)) {
            $user   = $_SESSION['saved_data']['item'];
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        $title    = 'Admin';
        include dirname(__DIR__) . '/Resources/templates/admin/add.php';
    }

    private function validationErrors($arr)
    {
        $errors = [];

        if (empty($arr['name']) || empty($arr['email']) || empty($arr['password'])) {
            $errors[] = 'All fields must be completed !';
        }

        if (!empty($arr['email'])) {
            if (filter_var($arr['email'], FILTER_VALIDATE_EMAIL) === FALSE) {
                $errors[] = 'Is not valid email address';
            } else {
                $sqlQuery = sprintf('SELECT * FROM users WHERE email = "%s"', $this->mysql->escape_string($_POST['email']));
                $result = $this->mysql->query($sqlQuery);
                if ($result->num_rows !== 0 ) {
                    $errors[] = 'User with this email already exists';
                }
            }
        }
        return $errors;
    }

    public  function addAction()
    {
        $errors = $this->validationErrors($_POST);

        if (!empty($errors)) {
            $_SESSION['saved_data']['item'] = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;
            header('Location: /admin/users/add');
        } else {
            $sqlQuery = sprintf(
                'INSERT INTO users SET name = "%s", email = "%s", password = "%s"',
                $this->mysql->escape_string($_POST['name']),
                $this->mysql->escape_string($_POST['email']),
                $this->mysql->escape_string($_POST['password'])
            );
            $this->mysql->query($sqlQuery);
            $title = 'Admin';
            $userResultString = 'User was added';

            include dirname(__DIR__) . '/Resources/templates/admin/add_action.php';
        }
    }
}
