<?php

if ($_SERVER['REQUEST_URI'] === '/admin/users') {
    require dirname(__DIR__) . '/src/users.php';
}