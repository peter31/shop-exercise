<?php

$url = $_SERVER['REQUEST_URI'];
$way = $_SERVER['REQUEST_METHOD'];

// Страница пользователей ...
if ($url === '/admin/users') {
    require dirname(__DIR__) . '/src/modules/users/admin_list.php';
}
// Страница добавления пользователя через форму ...
if ($url === '/admin/users/add') {
    require dirname(__DIR__) . '/src/modules/users/admin_add.php';
}

// Добавления пользователя ...
if ($url === '/admin/users/add_action' && $way == 'POST') {
        require dirname(__DIR__) . '/src/modules/users/admin_add_action.php';
}

// Страница добавления пользователя(ей) путём загрузки CSV файла ...
if ($url === '/admin/users/csv') {
    require dirname(__DIR__) . '/src/modules/users/admin_csv.php';
}

// Загрузка файла CSV ...
if ($url === '/admin/users/csv_action' && $way == 'POST') {
        require dirname(__DIR__) . '/src/modules/users/admin_csv_action.php';
}