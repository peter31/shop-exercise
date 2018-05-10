<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;
use User\Traits\GetUserManagerTrait;

use Common\Validator\Validator;
use Common\Validator\Strategy\EmailFormat;
use Common\Validator\Strategy\Exists;
use Common\Validator\Strategy\NotBlank;

class AdminEditController extends AdminAbstractController
{
    use GetUserManagerTrait;

    public function editForm()
    {
        $user = $this->getUserManager()->getById($_GET['id']);

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
            'id'       => [new NotBlank(), new Exists('users')],
            'name'     => [new NotBlank()],
            'email'    => [new NotBlank(), new EmailFormat()],
            'password' => [new NotBlank()],
        ]);

        $errors = $validator->validate($_POST);

        if (count($errors) > 0) {
            $_SESSION['saved_data']['user']   = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;
            $this->redirect('/admin/users/edit?id=' . $_POST['id']);
        } else {
            $this->getUserManager()->updateItem($_POST);
            $userResultString = 'User was changed';

            include dirname(__DIR__) . '/Resources/templates/admin/add_action.php';
        }
    }
}
