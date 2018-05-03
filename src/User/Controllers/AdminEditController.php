<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;

class AdminEditController extends AdminAbstractController
{
    public function editForm()
    {
        $sqlQuery = sprintf('SELECT * FROM users WHERE id = "%d"', $this->mysql->escape_string($_GET['id']));
        $user     = $this->mysql->query($sqlQuery)->fetch_assoc();

        if (array_key_exists('saved_data', $_SESSION)) {
            $user   = array_merge($user, $_SESSION['saved_data']['user']);
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        include dirname(__DIR__) . '/Resources/templates/admin/edit.php';
    }

    private function validationErrors($arr)
    {
        $errors = [];

        if (empty($_POST['id'])) {
            $errors[] = 'ID is empty';
        } else {
            $sqlQuery = sprintf('SELECT * FROM users WHERE id = "%d"', $this->mysql->escape_string($_POST['id']));
            $result = $this->mysql->query($sqlQuery)->num_rows;

            if ($result === 0) {
                $errors[] = 'User with this id does not exist';
            }
        }

        if (empty($arr['name']) || empty($arr['email']) || empty($arr['password'])) {
            $errors[] = 'All fields must be completed !';
        }

        if (!empty($arr['email'])) {
            if (filter_var($arr['email'], FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = 'Is not valid email address';
            }
        }
        return $errors;
    }

    public function editAction()
    {
        $errors = $this->validationErrors($_POST);

        if (count($errors) > 0) {
            $_SESSION['saved_data']['user']   = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;
            $this->redirect('/admin/users/edit?id=' . $_POST['id']);
        } else {
            $sqlQuery = sprintf(
                'UPDATE users SET name = "%s", email = "%s", status = "%d" WHERE id = "%d"',
                $this->mysql->escape_string($_POST['name']),
                $this->mysql->escape_string($_POST['email']),
                $this->mysql->escape_string($_POST['status']),
                $this->mysql->escape_string($_POST['id'])
            );

            $this->mysql->query($sqlQuery);
            $userResultString = 'User was changed';
            include dirname(__DIR__) . '/Resources/templates/admin/add_action.php';
        }
    }
}











