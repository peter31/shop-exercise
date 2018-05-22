<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;
use User\Traits\GetUserManagerTrait;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\NotBlank;
use Common\Constraints\Exists;
use Symfony\Component\Validator\Constraints\Email;

//use Common\Validator\Validator;
//use Common\Validator\Strategy\EmailFormat;
//use Common\Validator\Strategy\Exists;
//use Common\Validator\Strategy\NotBlank;

class AdminEditController extends AdminAbstractController
{
    use GetUserManagerTrait;

    public function editForm()
    {
        $user = $this->getUserManager()->getById($_GET['id']);

        if (null === $user) {
            return $this->show404();
        }

        if (array_key_exists('saved_data', $_SESSION)) {
            $user   = array_merge($user, $_SESSION['saved_data']['user']);
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        include dirname(__DIR__) . '/Resources/templates/admin/edit.php';
    }

    public function editAction()
    {
        $validator = Validation::createValidator();

        $constraints = new Collection([
            'id'       => [new NotBlank(), new Exists(['table' =>'users', 'field' => 'id'])],
            'name'     => [new NotBlank()],
            'email'    => [new NotBlank(), new Email()],
            'password' => [new NotBlank()],
            'status'   => []
        ]);

        $errors = $validator->validate($_POST, $constraints);

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
