<?php

namespace Advert\Controllers;

use Advert\Traits\GetAdvertManagerTrait;
use Common\Controllers\AbstractController;

class ListController extends AbstractController
{
    use GetAdvertManagerTrait;

    public function listAction()
    {

        $this->twig->display('@Advert/list.html.twig', [
            'adverts' => $this->getAdvertManager()->getActive(),
            'errors' => []
        ]);
    }

    public function viewAction()
    {
        $item = $this->getAdvertManager()->getById($_GET['id']);
        if (null === $item) {
            $this->show404();
        }

        $this->twig->display('@Advert/view.html.twig', [
            'item' => $item
        ]);
    }
}
