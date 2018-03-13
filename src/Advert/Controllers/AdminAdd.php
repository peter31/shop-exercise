<?php
namespace Advert\Controllers;

class AdminAdd
{
    public function addForm() {
        include dirname(__DIR__) . '/Templates/add.php';
    }

    public function addAction() {
        $errors = advertAddValidation($_POST);

        if (count($errors) > 0) {

            include dirname(__DIR__) . '/Templates/add.php';

        } else {
            $sqlQuery =
                'INSERT INTO adverts SET
                title = "' . mysqli_real_escape_string(connectDB(), $_POST['title']) . '",
                message = "' . mysqli_real_escape_string(connectDB(), $_POST['message']) . '",
                phone = "' . mysqli_real_escape_string(connectDB(), $_POST['phone']) . '"';

            mysqli_query(connectDB(), $sqlQuery);

            $userResultString = 'Advert is added';

            include dirname(__DIR__) . '/Templates/add_action.php';
        }
        mysqli_close(connectDB());
    }
}