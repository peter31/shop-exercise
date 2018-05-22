<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;
use User\Traits\GetUserManagerTrait;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Common\Validator\Strategy\Unique;

//use Common\Validator\Validator;
//use Common\Validator\Strategy\EmailFormat;
//use Common\Validator\Strategy\NotBlank;
//use Common\Validator\Strategy\Unique;

class AdminAddController extends AdminAbstractController
{
    use GetUserManagerTrait;

    public function addForm()
    {
        $user = [];

        if (array_key_exists('saved_data', $_SESSION)) {
            $user   = array_merge($user, $_SESSION['saved_data']['user']);
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        include dirname(__DIR__) . '/Resources/templates/admin/add.php';
    }

    public function addAction()
    {
        $validator = Validation::createValidator();

        $constraints = new Collection([
            'name'     => [new NotBlank()],
            'email'    => [new NotBlank(), new Email(), new Unique(['table' =>'users', 'field' => 'email'])],
            'password' => [new NotBlank()],
            'status'   => []
        ]);

        $errors = $validator->validate($_POST, $constraints);

//        $validator = new Validator([
//            'name'     => [new NotBlank()],
//            'email'    => [new NotBlank(), new EmailFormat(), new Unique('users')],
//            'password' => [new NotBlank()],
//        ]);

        if (!empty($errors)) {
            $_SESSION['saved_data']['user']   = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;
            $this->redirect('/admin/users/add');
        } else {
            $this->getUserManager()->createItem($_POST);

            $userResultString = 'New user was added';

            include dirname(__DIR__) . '/Resources/templates/admin/add_action.php';
        }
    }
}
