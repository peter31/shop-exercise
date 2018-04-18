<?php
namespace Common\Controllers;
use Common\Controllers\AbstractController;


class MainController extends AbstractController
{
    public function listAction()
    {
        $result = $this->mysql->query('SELECT * FROM adverts WHERE status = 1');
        $adverts = $result->fetch_all(MYSQLI_ASSOC);
        $title = 'Adverts';
        require dirname(__DIR__) . '/Resources/templates/list.php';
    }

    public function viewAction()
    {
        $sqlQuery = sprintf('SELECT * FROM adverts WHERE id = "%d"', $this->mysql->escape_string($_GET['id']));
        $result = $this->mysql->query($sqlQuery);
        $item = $result->fetch_assoc();
        include dirname(__DIR__) . '/Resources/templates/view.php';
    }
}