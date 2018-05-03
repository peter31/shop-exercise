<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;
use Common\Validator\Strategy\Exists;

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

    public function editAction()
    {
        $validator = new Validator([
            'id' => [new NotBlank(), new Exists('users')],
            'name' => [new NotBlank()],
            'email' => [new NotBlank(), new EmailFormat()],
            'password' => [new NotBlank()],
        ]);
        $errors = $validator->validate($_POST);

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











