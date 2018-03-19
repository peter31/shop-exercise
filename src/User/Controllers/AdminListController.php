<?php
namespace User\Controllers;

use Common\Controllers\AbstractController;

class AdminListController extends AbstractController
{
    public function listAction()
    {
        $result = $this->mysql->query('SELECT * FROM users');
        $users = $result->fetch_all(MYSQLI_ASSOC);
        require dirname(__DIR__) . '/Resources/templates/list.php';
    }

    public function importAction()
    {
        $result = $this->mysql->query('SELECT * FROM users');
        $users = $result->fetch_all(MYSQLI_ASSOC);

        require dirname(__DIR__) . '/Resources/templates/import.php';
    }

    public function deleteAction()
    {
        $sqlQuery = sprintf(
            'DELETE FROM users WHERE id = "%d"',
            $this->mysql->escape_string($_GET['id'])
        );
        $this->mysql->query($sqlQuery);

        $userResultString = 'User was deleted';
        include dirname(__DIR__) . '/Resources/templates/add_action.php';
    }
}
