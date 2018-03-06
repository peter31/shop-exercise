<?php
namespace Users\Controller;

class AdminController
{
    /**
     *
     */
    public function listAction()
    {
        $accessDB = openDB();
        $sqlQuery = 'SELECT * FROM users';
        $sqlData  = mysqli_query($accessDB, $sqlQuery);

        $users = [];
        while ($user = mysqli_fetch_assoc($sqlData)) {
            $users[] = $user;
        }

        mysqli_close($accessDB);

        require dirname(__DIR__) . '/Templates/list.php';
    }

    /**
     *
     */
    public function addAction()
    {
        include dirname(__DIR__) . '/Templates/add.php';
    }

    /**
     *
     */
    public function addHanderAction()
    {
        $errors = userAddValidation($_POST);

        $accessDB = openDB();

        if (!empty($_POST['email'])) {

            $sqlQuery = 'SELECT * FROM users WHERE email = "' . mysqli_real_escape_string($accessDB, $_POST['email']) . '"';

            if (mysqli_fetch_row(mysqli_query($accessDB, $sqlQuery)) !== NULL) {
                $errors[] = 'User with this email already exists';
            }
        }

        if (count($errors) > 0) {

            include dirname(__DIR__) . '/Templates/add.php';

        } else {

            $name  = $_POST['name'];
            $email = $_POST['email'];
            $pass  = $_POST['password'];

            $addUser =
                'INSERT INTO users SET
             name = "' . mysqli_real_escape_string($accessDB, $name) . '",
             email = "' . mysqli_real_escape_string($accessDB, $email) . '",
             password = "' . mysqli_real_escape_string($accessDB, $pass) . '"';

            mysqli_query($accessDB, $addUser);
            $userResultString = 'User is added';

            include dirname(__DIR__) . '/Templates/add_action.php';
        }

        mysqli_close($accessDB);
    }
}
