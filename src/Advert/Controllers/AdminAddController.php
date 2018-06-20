<?php
namespace Advert\Controllers;

use Common\Controllers\AdminAbstractController;
use Advert\Traits\GetAdvertManagerTrait;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\NotBlank;

class AdminAddController extends AdminAbstractController
{
    use GetAdvertManagerTrait;
    public function addForm()
    {
        $item = [];
        $errors = [];
        if (array_key_exists('saved_data', $_SESSION)) {
            $item = $_SESSION['saved_data']['item'];
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }
        $this->twig->display('@Advert/admin/add.html.twig', [
            'advert' => $item,
            'errors' => $errors
        ]);
    }

    public function addAction()
    {
        $validator = Validation::createValidator();
        $constraints = new Collection([
            'title'   => [new NotBlank()],
            'message' => [new NotBlank()],
            'phone'   => [new NotBlank()],
            'status'  => []
            ]);
        $errors = $validator->validate($_POST, $constraints);
        if (count($errors)) {
            $_SESSION['saved_data']['item'] = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;
            $this->redirect('/admin/adverts/add');
        } else {
            $this->getAdvertManager()->createItem($_POST);
            $this->redirect('/admin/adverts');
        }
    }
}
