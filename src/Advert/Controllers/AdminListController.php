<?php
namespace Advert\Controllers;

use Common\Controllers\AdminAbstractController;
use Advert\Traits\GetAdvertManagerTrait;

class AdminListController extends AdminAbstractController
{
    use GetAdvertManagerTrait;

    public function listAction()
    {
        $adverts = $this->getAdvertManager()->getAll();

        require dirname(__DIR__) . '/Resources/templates/admin/list.php';
    }

    public function deleteAction()
    {
        $this->getAdvertManager()->deleteById($_GET['id']);

        $this->redirect('/admin/adverts');
    }
}
