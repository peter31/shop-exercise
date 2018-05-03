<?php

namespace Advert\Controllers;

use Advert\Traits\GetAdvertManagerTrait;
use Common\Controllers\AbstractController;

class ListController extends AbstractController
{
    use GetAdvertManagerTrait;

    public function listAction()
    {
        $adverts  = $this->getAdvertManager()->getActive();

        require dirname(__DIR__) . '/Resources/templates/list.php';
    }

    public function viewAction()
    {
        $item = $this->getAdvertManager()->getById($_GET['id']);
        if (null === $item) {
            $this->show404();
        }

        include dirname(__DIR__) . '/Resources/templates/view.php';
    }
}
