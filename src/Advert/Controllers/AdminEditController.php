<?php
namespace Advert\Controllers;

class AdminEditController
{
    public  function editForm()
    {
        $sqlConn = connectDB();
        $sqlQuery = 'SELECT * FROM adverts WHERE id = "' . mysqli_real_escape_string($sqlConn, $_GET['id']) . '"';
        $user = mysqli_fetch_assoc(mysqli_query($sqlConn, $sqlQuery));
        mysqli_close($sqlConn);

        include dirname(__DIR__) . '/Templates/edit.php';
    }

    public function editAction()
    {
        $errors = advertAddValidation($_POST);

        if (empty($_POST['id'])) {
            $errors[] = 'ID is empty';

        } else {

            $sqlConn = connectDB();

            $sqlQuery = 'SELECT * FROM adverts WHERE id = "' . mysqli_real_escape_string($sqlConn, $_POST['id']) . '"';

            if (mysqli_fetch_row(mysqli_query($sqlConn, $sqlQuery)) === NULL) {
                $errors[] = 'Advert with this id does not exist';
            }
        }

        if (count($errors) > 0) {
            include dirname(__DIR__) . '/Templates/add.php';

        } else {

            $sqlConn = connectDB();

            $sqlQuery =
                'UPDATE adverts SET
                title = "' . mysqli_real_escape_string($sqlConn, $_POST['title']) . '",
                message = "' . mysqli_real_escape_string($sqlConn, $_POST['message']) . '",
                phone = "' . mysqli_real_escape_string($sqlConn, $_POST['phone']) . '",
                status = "' . mysqli_real_escape_string($sqlConn, $_POST['status']) . '"
                WHERE id = "' . mysqli_real_escape_string($sqlConn, $_POST['id']) . '"';

            mysqli_query($sqlConn, $sqlQuery);

            $userResultString = 'Advert was changed';

            include dirname(__DIR__) . '/Templates/add_action.php';
        }

        mysqli_close($sqlConn);
    }
}