<?php
namespace User\Controllers;

use Common\Controllers\AbstractController;

class AdminEditController extends AbstractController
{
    public function editForm()
    {
        $sqlQuery = sprintf(
            'SELECT * FROM users WHERE id = "%d"',
            $this->mysql->escape_string($_GET['id'])
        );
        $result = $this->mysql->query($sqlQuery);
        $user = $result->fetch_assoc();
        include dirname(__DIR__) . '/Resources/templates/edit.php';
    }

    public function editAction()
    {
        $errors = userAddValidation($_POST);
        $mysql = connectDB();

        if (empty($_POST['id'])) {
            $errors[] = 'ID is empty';
        } else {
            $sqlQuery = sprintf(
                'SELECT * FROM users WHERE id = "%d"',
                $mysql->escape_string($_POST['id'])
            );
            $result = $mysql->query($sqlQuery);
            if ($result->num_rows === 0) {
                $errors[] = 'User with this id does not exist';
            }
        }

        if (count($errors) > 0) {
            include dirname(__DIR__) . '/Resources/templates/add.php';
        } else {
            $sqlQuery = sprintf(
                'UPDATE users SET name = "%s", email = "%s", status = "%d" WHERE id = "%d"',
                $mysql->escape_string($_POST['name']),
                $mysql->escape_string($_POST['email']),
                $mysql->escape_string($_POST['status']),
                $mysql->escape_string($_POST['id'])
            );
            $mysql->query($sqlQuery);
            $userResultString = 'User was changed';
            include dirname(__DIR__) . '/Resources/templates/add_action.php';
        }
        $mysql->close();
    }
}










