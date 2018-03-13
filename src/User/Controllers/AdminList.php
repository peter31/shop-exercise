<?php
namespace User\Controllers;

class AdminList
{
    public function listAction()
    {
        $sqlQuery = 'SELECT * FROM users';
        $sqlData  = mysqli_query(connectDB(), $sqlQuery);

        $users = [];
        while ($user = mysqli_fetch_assoc($sqlData)) {
            $users[] = $user;
        }
        mysqli_close(connectDB());

        require dirname(__DIR__) . '/Templates/list.php';
    }

    public function deleteAction()
    {
        $sqlQuery = 'DELETE FROM users WHERE id = "' . mysqli_real_escape_string(connectDB(), $_GET['id']) . '"';

        mysqli_query(connectDB(), $sqlQuery);

        mysqli_close(connectDB());

        $userResultString = 'User was deleted';

        include dirname(__DIR__) . '/Templates/add_action.php';
    }
}