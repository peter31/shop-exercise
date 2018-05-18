<?php
namespace Advert\Controllers;

use Advert\Traits\GetAdvertManagerTrait;
use Common\Controllers\AdminAbstractController;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\NotBlank;
use Common\Constraints\Exists;

//use Common\Validator\Strategy\NotBlank;
//use Common\Validator\Validator;

class AdminEditController extends AdminAbstractController
{
    use GetAdvertManagerTrait;

    public function editForm()
    {
        $item = $this->getAdvertManager()->getById($_GET['id']);

        if (null === $item) {
            return $this->show404();
        }

        if (array_key_exists('saved_data', $_SESSION)) {
            $item = array_merge($item, $_SESSION['saved_data']['advert']);
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        include dirname(__DIR__) . '/Resources/templates/admin/edit.php';
    }

    public function editAction()
    {
        $validator = Validation::createValidator();

        $constraints = new Collection([
            'id'      => [new NotBlank(), new Exists(['table' => 'adverts', 'field' => 'id'])],
            'title'   => new NotBlank(),
            'message' => new NotBlank(),
            'phone'   => new NotBlank(),
            'status'  => []
        ]);

        $errors = $validator->validate($_POST, $constraints);

//        $validator = new Validator([
//            'id'      => [new NotBlank(), new Exists('adverts')],
//            'title'   => [new NotBlank()],
//            'message' => [new NotBlank()],
//            'phone'   => [new NotBlank()],
//        ]);
//        $errors = $validator->validate($_POST);

        if (count($errors) > 0) {
            $_SESSION['saved_data']['advert'] = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;

            $this->redirect('/admin/adverts/edit?id=' . $_POST['id']);
        } else {
            $this->getAdvertManager()->updateItem($_POST);

            $this->redirect('/admin/adverts');
        }
    }
}
