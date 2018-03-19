<?php
namespace Common\Controllers;

use Common\DB;

class AbstractController
{
    /** @var \mysqli */
    protected $mysql;

    public function __construct()
    {
        $this->mysql = DB::connect();
    }
}
