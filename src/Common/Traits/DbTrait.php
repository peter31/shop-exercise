<?php

namespace Advert\Traits;

use Common\DB;

trait DbTrait
{
    public function escape($value)
    {
        return Db::connect()->escape_string($value);
    }
}
