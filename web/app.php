<?php

error_reporting(E_ALL & ~E_STRICT);
ini_set('display_errors', 1);

list($path) = explode('?', $_SERVER['REQUEST_URI']);
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

// Форма редактирования пользователя ...
if ($path === '/admin/users/edit' && $method = 'GET') {
    require dirname(__DIR__) . '/src/modules/users/admin_edit.php';
}

// Форма редактирования пользователя ...
if ($path === '/admin/users/edit_action' && $method = 'POST') {
    require dirname(__DIR__) . '/src/modules/users/admin_edit_action.php';
}

// Удаление пользователя ...
if ($path === '/admin/users/delete_action' && $method = 'GET') {
    require dirname(__DIR__) . '/src/modules/users/admin_delete_action.php';
}

// Объявления ...
if ($path === '/adverts' && $method = 'GET') {
    require dirname(__DIR__) . '/src/modules/adverts/adverts.php';
}

// Форма добавить объявление ...
if ($path === '/add_adverts' && $method = 'GET') {
    require dirname(__DIR__) . '/src/modules/adverts/add_adverts.php';
}

// Добавить объявление ...
if ($path === '/add_adverts_action' && $method = 'POST') {
    require dirname(__DIR__) . '/src/modules/adverts/add_adverts_action.php';
}