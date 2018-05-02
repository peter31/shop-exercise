<?php

namespace Advert\Controllers;

use Common\Controllers\AbstractController;

class ListController extends AbstractController
{
    public function listAction()
    {
        $sqlQuery = 'SELECT * FROM adverts WHERE status = 1';
        $adverts  = $this->mysql->query($sqlQuery)->fetch_all(MYSQLI_ASSOC);

        require dirname(__DIR__) . '/Resources/templates/list.php';
    }

    public function viewAction()
    {
        $sqlQuery = sprintf('SELECT * FROM adverts WHERE id = "%d"', $this->mysql->escape_string($_GET['id']));
        $advert   = $this->mysql->query($sqlQuery)->fetch_assoc();

        include dirname(__DIR__) . '/Resources/templates/view.php';
    }
}