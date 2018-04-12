<?php
namespace Common;

class DB
{
    private static $link;

    public static function connect(): \mysqli
    {
        if (self::$link === null) {
            require dirname(__DIR__, 2) . '/config.php';
            self::$link = new \mysqli($db['host'], $db['user'], $db['pass'], $db['name']);
        }
        return self::$link;
    }

    public static function close()
    {
        if (self::$link !== null) {
            mysqli_close(self::$link);
            self::$link = NULL;
        }
    }
}
