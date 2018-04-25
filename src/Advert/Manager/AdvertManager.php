<?php

namespace Advert\Manager;

use Advert\Traits\DbTrait;
use Common\DB;

class AdvertManager
{
    use DbTrait;

    public function getAll($limit = 100)
    {
        return DB::connect()->query(
            sprintf('SELECT * FROM adverts LIMIT %d', $limit)
        )->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        return DB::connect()->query(
            sprintf('SELECT * FROM adverts WHERE id = "%d"', $this->escape($id))
        )->fetch_assoc();
    }

    public function deleteById($id)
    {
        return DB::connect()->query(
            sprintf('DELETE FROM adverts WHERE id = "%d"', $this->escape($id))
        );
    }
}
