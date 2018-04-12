<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;

class AdminAddController extends AdminAbstractController
{
    public function addForm()
    {
        include dirname(__DIR__) . '/Resources/templates/admin/add.php';
    }

    public function addAction()
    {
        $errors = userAddValidation($_POST);

        if (!empty($_POST['email'])) {
            $sqlQuery = sprintf(
                'SELECT * FROM users WHERE email = "%s"',
                $this->mysql->escape_string($_POST['email'])
            );

            $result = $this->mysql->query($sqlQuery);

            if ($result->num_rows !== 0) {
                $errors[] = 'User with this email already exists';
            }
        }

        if (count($errors) > 0) {
            include dirname(__DIR__) . '/Resources/templates/admin/add.php';
        } else {
            $sqlQuery = sprintf(
                'INSERT INTO users SET name = "%s", email = "%s", password = "%s"',
                $this->mysql->escape_string($_POST['name']),
                $this->mysql->escape_string($_POST['email']),
                $this->mysql->escape_string($_POST['password'])
            );
            $this->mysql->query($sqlQuery);

            $userResultString = 'User is added';

            include dirname(__DIR__) . '/Resources/templates/admin/add_action.php';
        }
    }
}