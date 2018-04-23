<?php
namespace User\Controllers;

use Common\Controllers\AbstractController;

class AuthController extends AbstractController
{


    public function login()
    {
        require dirname(__DIR__) . '/Resources/templates/login.php';
    }

    private function loginValidation($arr)
    {
        $errors = [];

        if (empty($arr['name']) || empty($arr['password'])) {
            $errors[] = 'All fields must be completed !';
        } else {
            $sqlQuery = sprintf('SELECT * FROM users WHERE name = "%s"', $this->mysql->escape_string($_POST['name']));
            $user = $this->mysql->query($sqlQuery)->fetch_assoc();
            if ($user['name'] !== $_POST['name'] || $user['password'] !== $_POST['password']) {
                $errors[] = 'Wrong username or password !';
            }
        }

        return $errors;
    }

    public function loginAction()
    {

        $errors = $this->loginValidation($_POST);

        if (empty($errors)) {
            $_SESSION['user_login_name'] = $_POST['name'];
            header('Location: /');
        } else {
            $_SESSION['saved_errors'] = $errors;
            header('Location: /user/login');
        }
    }

    public function logoutAction()
    {
        unset($_SESSION['user_login_name']);
        header('Location: /');
    }

    public function registration()
    {
        require dirname(__DIR__) . '/Resources/templates/registration.php';
    }

    public function registrationAction()
    {
        require dirname(__DIR__) . '/Resources/templates/registration.php';
    }

}