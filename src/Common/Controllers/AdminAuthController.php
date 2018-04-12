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
//        require dirname(__DIR__, 2) . '/config.php';
        var_dump($_SESSION['admin_back_url']);die;
        if ($_POST['user'] === $admin['user'] && $_POST['pass'] === $admin['pass']) {
            $_SESSION['admin_auth_login'] = 'OK';
        }




        var_dump($_POST);die;
        header('Location: $_SESSION[\'admin_back_url\']');
    }

    public function logOutAction()
    {
    }
}