<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 11.04.2018
 * Time: 15:51
 */

namespace Common\Controllers;


class MainController extends AbstractController
{
    public function listAction()
    {
        $result = $this->mysql->query('SELECT * FROM adverts WHERE status = 1 LIMIT 5');
        $adverts = $result->fetch_all(MYSQLI_ASSOC);
        $title = 'Adverts MD';
        require dirname(__DIR__) . '/Resources/templates/list.php';
    }
}