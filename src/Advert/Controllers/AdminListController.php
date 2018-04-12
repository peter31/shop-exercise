<?php
namespace Advert\Controllers;

use Common\Controllers\AdminAbstractController;

class AdminListController extends AdminAbstractController
{
    public function listAction()
    {
        $result = $this->mysql->query('SELECT * FROM adverts');
        $adverts = $result->fetch_all(MYSQLI_ASSOC);
        require dirname(__DIR__) . '/Resources/templates/admin/list.php';
    }

    public function deleteAction()
    {
        $sqlQuery = sprintf('DELETE FROM adverts WHERE id = "%d"', $this->mysql->escape_string($_GET['id']));
        $this->mysql->query($sqlQuery);
        $userResultString = 'Advert was deleted';
        include dirname(__DIR__) . '/Resources/templates/admin/add_action.php';
    }
}