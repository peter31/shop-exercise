<?php
namespace Common\Controllers;


class AdminAuthController
{
    public function logIn()
    {
        require dirname(__DIR__) . '/Resources/templates/admin/login.php';
    }

    public function logInAction()
    {
        require dirname(__DIR__, 3) . '/config.php';

        if ($_POST['user'] === $admin['user'] && $_POST['pass'] === $admin['pass']) {
            $_SESSION['admin_auth_login'] = 'OK';
            if (array_key_exists('admin_back_url', $_SESSION)) {
                header('Location: ' . $_SESSION['admin_back_url']);
            } else {
                header('Location: /admin/adverts');
            }
        }
        header('Location: /admin/login');
    }

    public function logOutAction()
    {
        $_SESSION = array();
        header('Location: /admin/login');
    }
}