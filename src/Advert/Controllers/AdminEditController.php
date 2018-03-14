<?php
namespace Advert\Controllers;

class AdminEditController
{
    public function editForm()
    {
        $mysql = connectDB();
        $sqlQuery = sprintf('SELECT * FROM adverts WHERE id = "%d"', $mysql->escape_string($_GET['id']));
        $result = $mysql->query($sqlQuery);
        $advert = $result->fetch_assoc();
        $mysql->close();
        include dirname(__DIR__) . '/Templates/edit.php';
    }

    public function editAction()
    {
        $errors = advertAddValidation($_POST);

        if (empty($_POST['id'])) {
            $errors[] = 'ID is empty';
        } else {
            $mysql = connectDB();
            $sqlQuery = sprintf('SELECT FROM adverts WHERE id = "%d"', $mysql->escape_string($_POST['id']));
            $result = $mysql->query($sqlQuery);
            if ($result->fetch_row() === NULL) {
                $errors[] = 'Advert with this id does not exist';
            }
        }

        if (count($errors) > 0) {
            include dirname(__DIR__) . '/Templates/add.php';
        } else {
            $mysql = connectDB();
            $sqlQuery = sprintf(
                'UPDATE adverts SET title = "%s", message = "%s", phone = "%s", status = "%s" WHERE id = "%d"',
                $mysql->escape_string($_POST['title']),
                $mysql->escape_string($_POST['message']),
                $mysql->escape_string($_POST['phone']),
                $mysql->escape_string($_POST['status']),
                $mysql->escape_string($_POST['id'])
            );
            $mysql->query($sqlQuery);
            $mysql->close();
            $userResultString = 'Advert was changed';
            include dirname(__DIR__) . '/Templates/add_action.php';
        }
    }
}