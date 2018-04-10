<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 04.04.2018
 * Time: 12:51
 */

namespace Common\Controllers;


class AdminAuthController
{
    public function logIn()
    {
        require dirname(__DIR__) . '/Resources/templates/admin/login.php';
    }

    public function logInAction()
    {
    }

    public function logOutAction()
    {
    }
}