<?php

error_reporting(E_ALL & ~E_STRICT);
ini_set('display_errors', 1);

require_once dirname(__DIR__) . '/src/functions.php';
spl_autoload_register('my_autoload');

list($path) = explode('?', $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];

$srcDir = dirname(__DIR__) . '/src';


// Страница пользователей ...
if ($path === '/admin/users') {
    $controller = new \Users\Controller\AdminController();
    $controller->listAction();
}

// Страница добавления пользователя через форму ...
if ($path === '/admin/users/add') {
    $controller = new \Users\Controller\AdminController();
    $controller->addAction();
}

// Добавления пользователя ...
if ($path === '/admin/users/add_action' && $method === 'POST') {
    $controller = new \Users\Controller\AdminController();
    $controller->addHanderAction();
}

// Страница добавления пользователя(ей) путём загрузки CSV файла ...
if ($path === '/admin/users/csv') {
    require dirname(__DIR__) . '/src/Users/Controller/admin_csv.php';
}

// Загрузка файла CSV ...
if ($path === '/admin/users/csv_action' && $method === 'POST') {
    require dirname(__DIR__) . '/src/Users/Controller/admin_csv_action.php';
}

// Форма редактирования пользователя ...
if ($path === '/admin/users/edit' && $method === 'GET') {
    require dirname(__DIR__) . '/src/Users/Controller/admin_edit.php';
}

// Форма редактирования пользователя ...
if ($path === '/admin/users/edit_action' && $method === 'POST') {
    require dirname(__DIR__) . '/src/Users/Controller/admin_edit_action.php';
}

// Удаление пользователя ...
if ($path === '/admin/users/delete_action' && $method === 'GET') {
    require dirname(__DIR__) . '/src/Users/Controller/admin_delete_action.php';
}

// Объявления ...
if ($path === '/admin/adverts' && $method === 'GET') {
    require dirname(__DIR__) . '/src/Adverts/Controller/admin_list.php';
}

// Форма добавить объявление ...
if ($path === '/admin/adverts/add' && $method === 'GET') {
    require dirname(__DIR__) . '/src/Adverts/Controller/admin_add.php';
}

// Добавить объявление ...
if ($path === '/admin/adverts/add_action' && $method === 'POST') {
    require dirname(__DIR__) . '/src/Adverts/Controller/admin_add_action.php';
}

// Форма редактирования объявления ...
if ($path === '/admin/adverts/edit' && $method === 'GET') {
    require dirname(__DIR__) . '/src/Adverts/Controller/admin_edit.php';
}

// Редактирование объявления ...
if ($path === '/admin/adverts/edit_action' && $method === 'POST') {
    require dirname(__DIR__) . '/src/Adverts/Controller/admin_edit_action.php';
}

// Удаление  объявления ...
if ($path === '/admin/adverts/delete_action' && $method === 'GET') {
    require dirname(__DIR__) . '/src/Adverts/Controller/admin_delete_action.php';
}
