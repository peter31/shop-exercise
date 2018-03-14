<?php
namespace Advert\Controllers;

class AdminAddController
{
    public function addForm()
    {
        include dirname(__DIR__) . '/Templates/add.php';
    }

    public function addAction()
    {
        $errors = advertAddValidation($_POST);

        if (count($errors) > 0) {

            include dirname(__DIR__) . '/Templates/add.php';
        } else {
            $mysql = connectDB();
            $sqlQuery = sprintf(
                'INSERT INTO adverts SET title = "%s", message = "%s", phone = "%s"',
                $mysql->escape_string($_POST['title']),
                $mysql->escape_string($_POST['message']),
                $mysql->escape_string($_POST['phone'])
            );
            $mysql->query($sqlQuery);
            $mysql->close();
            $userResultString = 'Advert is added';
            include dirname(__DIR__) . '/Templates/add_action.php';
        }
     }
}