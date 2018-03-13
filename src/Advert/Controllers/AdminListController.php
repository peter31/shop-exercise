<?php
namespace Advert\Controllers;

class AdminListController
{
    public function listAction()
    {
        $sqlQuery = 'SELECT * FROM adverts';
        $sqlData = mysqli_query(connectDB(), $sqlQuery);

        $adverts = [];
        while ($advert = mysqli_fetch_assoc($sqlData)) {
            $adverts[] = $advert;
        }

        mysqli_close(connectDB());

        require dirname(__DIR__) . '/Templates/list.php';
    }

    public function deleteAction()
    {
        $sqlQuery = 'DELETE FROM adverts WHERE id = "' . mysqli_real_escape_string(connectDB(), $_GET['id']) . '"';

        mysqli_query(connectDB(), $sqlQuery);

        mysqli_close(connectDB());

        $userResultString = 'Advert was deleted';

        include dirname(__DIR__) . '/Templates/add_action.php';
    }
}