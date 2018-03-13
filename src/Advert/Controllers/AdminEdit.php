<?php
namespace Advert\Controllers;

class AdminEdit
{
    public  function editForm() {

        $sqlQuery = 'SELECT * FROM adverts WHERE id = "' . mysqli_real_escape_string(connectDB(), $_GET['id']) . '"';
        $user = mysqli_fetch_assoc(mysqli_query(connectDB(), $sqlQuery));
        mysqli_close(connectDB());

        include dirname(__DIR__) . '/Templates/edit.php';
    }

    public function editAction() {
        $errors = advertAddValidation($_POST);

        if (empty($_POST['id'])) {
            $errors[] = 'ID is empty';

        } else {
            $sqlQuery = 'SELECT * FROM adverts WHERE id = "' . mysqli_real_escape_string(connectDB(), $_POST['id']) . '"';

            if (mysqli_fetch_row(mysqli_query(connectDB(), $sqlQuery)) === NULL) {
                $errors[] = 'Advert with this id does not exist';
            }
        }

        if (count($errors) > 0) {
            include dirname(__DIR__) . '/Templates/add.php';

        } else {
            $sqlQuery =
                'UPDATE adverts SET
                title = "' . mysqli_real_escape_string(connectDB(), $_POST['title']) . '",
                message = "' . mysqli_real_escape_string(connectDB(), $_POST['message']) . '",
                phone = "' . mysqli_real_escape_string(connectDB(), $_POST['phone']) . '",
                status = "' . mysqli_real_escape_string(connectDB(), $_POST['status']) . '"
                WHERE id = "' . mysqli_real_escape_string(connectDB(), $_POST['id']) . '"';

            mysqli_query(connectDB(), $sqlQuery);

            $userResultString = 'Advert was changed';

            include dirname(__DIR__) . '/Templates/add_action.php';
        }

        mysqli_close(connectDB());
    }
}