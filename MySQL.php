<?php
namespace Common;

class MySQL
{
    protected $link;

    public function connect()
    {
        require __DIR__ . '/config.php';

        $this->link = mysqli_connect($db['host'], $dbConfig['user'],  $db['pass'], $db['name']);

        return (bool) $this->link;
    }

    public function query($query)
    {
        return mysqli_query($this->link, $query);
    }

    public function close()
    {
        mysqli_close($this->link);
    }
}