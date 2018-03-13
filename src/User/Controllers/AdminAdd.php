<?php
namespace User\Controllers;

class AdminAdd
{
    public function addForm() {
        include dirname(__DIR__) . '/Templates/add.php';
    }

    public function addAction() {
        $errors = userAddValidation($_POST);

        if (!empty($_POST['email'])) {
            $sqlQuery = 'SELECT * FROM users WHERE email = "' . mysqli_real_escape_string(connectDB(), $_POST['email']) . '"';
            if (mysqli_fetch_row(mysqli_query(connectDB(), $sqlQuery)) !== NULL) {
                $errors[] = 'User with this email already exists';
            }
        }

        if (count($errors) > 0) {
            include dirname(__DIR__) . '/Templates/add.php';
        } else {
            $sqlQuery =
                'INSERT INTO users SET
                name = "' . mysqli_real_escape_string(connectDB(), $_POST['name']) . '",
                email = "' . mysqli_real_escape_string(connectDB(), $_POST['email']) . '",
                password = "' . mysqli_real_escape_string(connectDB(), $_POST['password']) . '"';

            mysqli_query(connectDB(), $sqlQuery);

            $userResultString = 'User is added';

            include dirname(__DIR__) . '/Templates/add_action.php';

            mysqli_close(connectDB());
        }
    }
}