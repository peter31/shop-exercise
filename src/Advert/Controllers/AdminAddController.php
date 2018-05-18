<?php
namespace Advert\Controllers;

use Advert\Traits\GetAdvertManagerTrait;
use Common\Controllers\AdminAbstractController;
//use Common\Validator\Strategy\NotBlank;
//use Common\Validator\Validator;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\NotBlank;


class AdminAddController extends AdminAbstractController
{
    use GetAdvertManagerTrait;

    public function addForm()
    {
        $item = [];
        if (array_key_exists('saved_data', $_SESSION)) {
            $item   = array_merge($item, $_SESSION['saved_data']['item']);
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        include dirname(__DIR__) . '/Resources/templates/admin/add.php';
    }

    public function addAction()
    {

//        $validator = new Validator([
//            'title'   => [new NotBlank()],
//            'message' => [new NotBlank()],
//            'phone'   => [new NotBlank()],
//        ]);
//        $errors = $validator->validate($_POST);

        $validator = Validation::createValidator();

        $constraints = new Collection([
            'title'   => new NotBlank(),
            'message' => new NotBlank(),
            'phone'   => new NotBlank(),
            'status'  => []
        ]);

        $errors = $validator->validate($_POST, $constraints);

        if (count($errors)) {
            $_SESSION['saved_data']['item']   = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;

            $this->redirect('/admin/adverts/add');
        } else {
            $this->getAdvertManager()->createItem($_POST);

            $this->redirect('/admin/adverts');
        }
    }
}
