<?php
namespace Common\Controllers;

use Common\DB;
use Common\Controllers\AdminAuthController;




class AdminAbstractController
{
    protected $mysql;

    public function __construct()
    {
        if (!array_key_exists('admin_auth_login', $_SESSION)) {
            $_SESSION['admin_back_url'] = $_SERVER['REQUEST_URI'];
            header('Location: /admin/login');
        }
        $this->mysql = DB::connect();
    }
}