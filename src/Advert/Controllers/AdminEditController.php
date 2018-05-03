<?php
namespace Advert\Controllers;

use Advert\Traits\GetAdvertManagerTrait;
use Common\Controllers\AdminAbstractController;

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

    private function advertEditValidation($arr)
    {
        $errors = [];

        if (empty($arr['title']) || empty($arr['message']) || empty($arr['phone'])) {
            $errors[] = 'All fields must be completed';
        }

        if (empty($_POST['id'])) {
            $errors[] = 'ID is empty';
        } else {
            $item = $this->getAdvertManager()->getById($_POST['id']);
            if (null === $item) {
                $errors[] = 'Advert with this id does not exist';
            }
        }

        return $errors;
    }

    public function editAction()
    {
        $errors = $this->advertEditValidation($_POST);

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
