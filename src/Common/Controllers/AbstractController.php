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
}
