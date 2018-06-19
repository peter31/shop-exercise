<?php
namespace Advert\Controllers;

use Common\Controllers\AdminAbstractController;
use Advert\Traits\GetAdvertManagerTrait;

class AdminListController extends AdminAbstractController
{
    use GetAdvertManagerTrait;

    public function listAction()
    {
        $this->twig->display('@Advert/admin/list.html.twig', [
            'adverts' => $this->getAdvertManager()->getAll()
        ]);
    }

    public function deleteAction()
    {
        $this->getAdvertManager()->deleteById($_GET['id']);
        $this->redirect('/admin/adverts');
    }
}
