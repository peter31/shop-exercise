<?php

namespace User\Manager;

use Common\DB;
use Common\Traits\DbTrait;

class UserManager
{
    use DbTrait;

    public function getAll($limit = 100)
    {
        return DB::connect()->query(
            sprintf('SELECT * FROM users LIMIT %d', $limit)
        )->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        return DB::connect()->query(
            sprintf('SELECT * FROM users WHERE id = "%d"', $this->escape($id))
        )->fetch_assoc();
    }

    public function getByEmail($email)
    {
        return DB::connect()->query(
            sprintf('SELECT * FROM users WHERE email = "%s"', $this->escape($email))
        )->fetch_assoc();
    }

    public function deleteById($id)
    {
        return DB::connect()->query(
            sprintf('DELETE FROM users WHERE id = "%d"', $this->escape($id))
        );
    }

    public function createItem(array $data)
    {
        $sqlQuery = sprintf(
            'INSERT INTO users SET title = "%s", message = "%s", phone = "%s", status = "%s"',
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
            'UPDATE users SET title = "%s", message = "%s", phone = "%s", status = "%s" WHERE id = "%d"',
            $this->escape($data['title']),
            $this->escape($data['message']),
            $this->escape($data['phone']),
            $this->escape($data['status']),
            $this->escape($data['id'])
        );

        return DB::connect()->query($sqlQuery);
    }
}
