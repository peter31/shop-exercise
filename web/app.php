<?php


if ($_SERVER['REQUEST_URI'] === '/admin/users') {
    require dirname(__DIR__) . '/src/users.php';
}


if ($_SERVER['REQUEST_URI'] === '/admin/users/add') {
    require dirname(__DIR__) . '/src/users_add.php';
}
if ($_SERVER['REQUEST_URI'] === '/admin/users/add_action') {
    require dirname(__DIR__) . '/src/users_add_action.php';
}


if ($_SERVER['REQUEST_URI'] === '/admin/users/csv') {
    require dirname(__DIR__) . '/src/users_csv.php';
}
if ($_SERVER['REQUEST_URI'] === '/admin/users/csv_action') {
    require dirname(__DIR__) . '/src/users_csv_action.php';
}
