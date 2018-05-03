<?php
namespace Advert\Controllers;

use Advert\Traits\GetAdvertManagerTrait;
use Common\Controllers\AdminAbstractController;

class AdminAddController extends AdminAbstractController
{
    use GetAdvertManagerTrait;

    public function addForm()
    {
        $item = [];
        if (array_key_exists('saved_data', $_SESSION)) {
            $item = array_merge($item, $_SESSION['saved_data']['item']);
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        include dirname(__DIR__) . '/Resources/templates/admin/add.php';
    }

    private function advertAddValidation($arr)
    {
        $errors = [];
        if (empty($arr['title']) || empty($arr['message']) || empty($arr['phone'])) {
            $errors[] = 'All fields must be completed';
        }

        return $errors;
    }

    public function addAction()
    {
        $errors = $this->advertAddValidation($_POST);

        if (count($errors) > 0) {
            $_SESSION['saved_data']['item'] = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;

            $this->redirect('/admin/adverts/add');
        } else {
            $this->getAdvertManager()->createItem($_POST);

            $this->redirect('/admin/adverts');
        }
    }
}
