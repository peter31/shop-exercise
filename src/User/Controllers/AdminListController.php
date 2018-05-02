<?php
namespace User\Controllers;
use Common\Controllers\AdminAbstractController;

class AdminListController extends AdminAbstractController
{
    public function listAction()
    {
        $sqlQuery = 'SELECT * FROM users';
        $users    = $this->mysql->query($sqlQuery)->fetch_all(MYSQLI_ASSOC);
        require dirname(__DIR__) . '/Resources/templates/admin/list.php';
    }

    public function deleteAction()
    {
        $sqlQuery = sprintf('DELETE FROM users WHERE id = "%d"', $this->mysql->escape_string($_GET['id']));
        $this->mysql->query($sqlQuery);

        $userResultString = 'User was deleted';
        include dirname(__DIR__) . '/Resources/templates/admin/add_action.php';
    }
}
