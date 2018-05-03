<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;
use Common\Validator\Strategy\EmailFormat;
use Common\Validator\Strategy\NotBlank;
use Common\Validator\Strategy\Unique;
use Common\Validator\Validator;
use User\Traits\GetUserManagerTrait;

class AdminAddController extends AdminAbstractController
{
    use GetUserManagerTrait;

    public function addForm()
    {
        if (array_key_exists('saved_data', $_SESSION)) {
            $user   = $_SESSION['saved_data']['item'];
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        $title    = 'Admin';
        include dirname(__DIR__) . '/Resources/templates/admin/add.php';
    }

    public function addAction()
    {
        $validator = new Validator([
            'name' => [new NotBlank()],
            'email' => [new NotBlank(), new EmailFormat(), new Unique('users')],
            'password' => [new NotBlank()],
        ]);
        $errors = $validator->validate($_POST);

        if (!empty($errors)) {
            $_SESSION['saved_data']['item'] = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;
            $this->redirect('/admin/users/add');
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
