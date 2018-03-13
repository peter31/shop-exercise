<?php

error_reporting(E_ALL & ~E_STRICT);
ini_set('display_errors', 1);

require_once dirname(__DIR__) . '/src/functions.php';
spl_autoload_register('autoload');

list($path) = explode('?', $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];

// Users list ...
if ($path === '/admin/users') {
    $controller = new \User\Controllers\AdminList();
    $controller->listAction();
}

// User add form ...
if ($path === '/admin/users/add') {
    $controller = new \User\Controllers\AdminAdd();
    $controller->addForm();
}

// User add action ...
if ($path === '/admin/users/add_action' && $method === 'POST') {
    $controller = new \User\Controllers\AdminAdd();
    $controller->addAction();
}

// Get CSV file ...
if ($path === '/admin/users/csv') {
    $controller = new \User\Controllers\AdminCSV();
    $controller->getCSV();
}

// Send CSV file ...
if ($path === '/admin/users/csv_action' && $method === 'POST') {
        $controller = new \User\Controllers\AdminCSV();
        $controller->sendCSV();
}

// User edit form ...
if ($path === '/admin/users/edit' && $method === 'GET') {
    $controller = new \User\Controllers\AdminEdit();
    $controller->editForm();
}

// User edit action ...
if ($path === '/admin/users/edit_action' && $method === 'POST') {
    $controller = new \User\Controllers\AdminEdit();
    $controller->editAction();
}

// Delete user ...
if ($path === '/admin/users/delete_action' && $method === 'GET') {
    $controller = new \User\Controllers\AdminList();
    $controller->deleteAction();
}

//// Объявления ...
//if ($path === '/admin/adverts' && $method === 'GET') {
//    require dirname(__DIR__) . '/src/Advert/Controllers/admin_list.php';
//}
//
//// Форма добавить объявление ...
//if ($path === '/admin/adverts/add' && $method === 'GET') {
//    require dirname(__DIR__) . '/src/Advert/Controllers/admin_add.php';
//}
//
//// Добавить объявление ...
//if ($path === '/admin/adverts/add_action' && $method === 'POST') {
//    require dirname(__DIR__) . '/src/Advert/Controllers/admin_add_action.php';
//}
//
//// Форма редактирования объявления ...
//if ($path === '/admin/adverts/edit' && $method === 'GET') {
//    require dirname(__DIR__) . '/src/Advert/Controllers/admin_edit.php';
//}
//
//// Редактирование объявления ...
//if ($path === '/admin/adverts/edit_action' && $method === 'POST') {
//    require dirname(__DIR__) . '/src/Advert/Controllers/admin_edit_action.php';
//}
//
//// Удаление  объявления ...
//if ($path === '/admin/adverts/delete_action' && $method === 'GET') {
//    require dirname(__DIR__) . '/src/Advert/Controllers/admin_delete_action.php';
//}
