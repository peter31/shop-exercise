<?php

namespace Common\Controllers;


class AdminAuthController
{
    private function loginValidation($arr)
    {
        require dirname(__DIR__, 3) . '/config.php';

        $errors = [];

        if (empty($arr['user']) || empty($arr['pass'])) {
            $errors[] = 'All fields must be completed !';
        } elseif ($_POST['user'] !== $admin['user'] && $_POST['pass'] !== $admin['pass']) {
            $errors[] = 'Wrong username or password !';
        }

        return $errors;
    }

    public function login()
    {
        if (array_key_exists('admin_auth_login', $_SESSION)) {
            header('Location: /admin');
        } else {
            $title = 'Login';
            require dirname(__DIR__) . '/Resources/templates/admin/login.php';
        }
    }

    public function loginAction()
    {
        $errors = $this->loginValidation($_POST);

        $back_url = $_SESSION['admin_back_url'] ?? '/admin';

        if (count($errors) > 0) {
            $_SESSION['saved_errors'] = $errors;
            header('Location: /admin/login');
        } else {
            $_SESSION['admin_auth_login'] = $_POST['user'];

            if (array_key_exists('admin_back_url', $_SESSION)) {
                unset($_SESSION['admin_back_url']);
            }

            if (array_key_exists('saved_errors', $_SESSION)) {
                unset($_SESSION['saved_errors']);
            }

            header('Location: ' . $back_url);
            }
        }

    public function logoutAction()
    {
        unset($_SESSION['admin_auth_login']);
        header('Location: /admin/login');
    }
}