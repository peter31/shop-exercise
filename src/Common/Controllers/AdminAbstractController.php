<?php
namespace Common\Controllers;

use Common\DB;

class AdminAbstractController extends AbstractController
{
    public function __construct()
    {
        if (!array_key_exists('admin_auth_login', $_SESSION)) {
            $_SESSION['admin_back_url'] = $_SERVER['REQUEST_URI'];
            $this->redirect('/admin/login');
            exit;
        }

        parent::__construct();
    }
}
