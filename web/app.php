<?php

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Страница пользователей ...
if ($path === '/admin/users') {
    require dirname(__DIR__) . '/src/modules/users/admin_list.php';
}

// Страница добавления пользователя через форму ...
if ($path === '/admin/users/add') {
    require dirname(__DIR__) . '/src/modules/users/admin_add.php';
}

// Добавления пользователя ...
if ($path === '/admin/users/add_action' && $method === 'POST') {
    require dirname(__DIR__) . '/src/modules/users/admin_add_action.php';
}

// Страница добавления пользователя(ей) путём загрузки CSV файла ...
if ($path === '/admin/users/csv') {
    require dirname(__DIR__) . '/src/modules/users/admin_csv.php';
}

// Загрузка файла CSV ...
if ($path === '/admin/users/csv_action' && $method === 'POST') {
    require dirname(__DIR__) . '/src/modules/users/admin_csv_action.php';
}