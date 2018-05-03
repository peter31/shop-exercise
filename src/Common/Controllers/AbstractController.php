<?php
namespace Common\Controllers;

use Common\DB;

class AbstractController
{
    protected $mysql;

    public function __construct()
    {
        $this->mysql = DB::connect();
    }

    public function show404()
    {
        header("HTTP/1.0 404 Not Found", true, 404);

        include dirname(__DIR__, 2) . '/Common/Resources/templates/404.php';
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
    }
}
