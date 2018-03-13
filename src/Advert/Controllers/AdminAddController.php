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

            $sqlConn = connectDB();

            $sqlQuery =
                'INSERT INTO adverts SET
                title = "' . mysqli_real_escape_string($sqlConn, $_POST['title']) . '",
                message = "' . mysqli_real_escape_string($sqlConn, $_POST['message']) . '",
                phone = "' . mysqli_real_escape_string($sqlConn, $_POST['phone']) . '"';

            mysqli_query($sqlConn, $sqlQuery);

            mysqli_close($sqlConn);

            $userResultString = 'Advert is added';

            include dirname(__DIR__) . '/Templates/add_action.php';
        }
     }
}