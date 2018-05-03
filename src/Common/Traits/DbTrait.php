<?php

namespace Common\Traits;

use Common\DB;

trait DbTrait
{
    public function escape($value)
    {
        return Db::connect()->escape_string($value);
    }
}
