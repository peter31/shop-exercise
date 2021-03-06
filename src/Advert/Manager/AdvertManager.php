<?php

namespace Advert\Manager;

use Common\DB;
use Common\Traits\DbTrait;

class AdvertManager
{
    use DbTrait;

    public function getAll($limit = 100)
    {
        return DB::connect()->query(
            sprintf('SELECT * FROM adverts LIMIT %d', $limit)
        )->fetch_all(MYSQLI_ASSOC);
    }

    public function getActive($limit = 100)
    {
        $sqlQuery = sprintf('SELECT * FROM adverts WHERE status = 1 LIMIT %d', $limit);
        return DB::connect()->query($sqlQuery)->fetch_all(MYSQLI_ASSOC);
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

    public function createItem(array $data)
    {
        $sqlQuery = sprintf(
            'INSERT INTO adverts SET title = "%s", message = "%s", phone = "%s", status = "%s"',
            $this->escape($data['title']),
            $this->escape($data['message']),
            $this->escape($data['phone']),
            $this->escape($data['status'])
        );

        return DB::connect()->query($sqlQuery);
    }

    public function updateItem(array $data)
    {
        $sqlQuery = sprintf(
            'UPDATE adverts SET title = "%s", message = "%s", phone = "%s", status = "%s" WHERE id = "%d"',
            $this->escape($data['title']),
            $this->escape($data['message']),
            $this->escape($data['phone']),
            $this->escape($data['status']),
            $this->escape($data['id'])
        );

        return DB::connect()->query($sqlQuery);
    }
}
