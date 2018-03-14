<?php
namespace User\Controllers;

class AdminListController
{
    public function listAction()
    {
        $mysql = connectDB();
        $result  = $mysql->query('SELECT * FROM users');
        $users = $result->fetch_all(MYSQLI_ASSOC);
        $mysql->close();
        require dirname(__DIR__) . '/Templates/list.php';
    }

    public function deleteAction()
    {
        $mysql = connectDB();
        $sqlQuery = sprintf('DELETE FROM users WHERE id = "%d"', $mysql->escape_string($_GET['id']));
        $mysql->query($sqlQuery);
        $mysql->close();
        $userResultString = 'User was deleted';
        include dirname(__DIR__) . '/Templates/add_action.php';
    }
}