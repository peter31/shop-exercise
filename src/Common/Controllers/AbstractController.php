<?php
namespace Common\Controllers;

use Common\DB;

class AbstractController
{
    protected $mysql;

    public function __construct()
    {
//        if (!array_key_exists('user_auth_login', $_SESSION)) {
//            $_SESSION['user_back_url'] = $_SERVER['REQUEST_URI'];
//            header('Location: /admin/login');
//            exit;
//        }
        $this->mysql = DB::connect();
    }
}