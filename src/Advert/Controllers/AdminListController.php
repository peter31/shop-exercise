<?php
namespace Advert\Controllers;

class AdminListController
{
    public function listAction()
    {
        $mysql = connectDB();
        $result  = $mysql->query('SELECT * FROM adverts');
        $adverts = $result->fetch_all(MYSQLI_ASSOC);
        $mysql->close();
        require dirname(__DIR__) . '/Resources/templates/list.php';
    }

    public function deleteAction()
    {
        $mysql = connectDB();
        $sqlQuery = sprintf('DELETE FROM adverts WHERE id = "%d"', $mysql->escape_string($_GET['id']));
        $mysql->query($sqlQuery);
        $mysql->close();
        $userResultString = 'Advert was deleted';
        include dirname(__DIR__) . '/Resources/templates/add_action.php';
    }
}