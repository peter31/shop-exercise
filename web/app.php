<?php

error_reporting(E_ALL & ~E_STRICT);
ini_set('display_errors', 1);

require_once dirname(__DIR__) . '/src/Common/functions.php';
spl_autoload_register('autoload');

list($path) = explode('?', $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];

// Users list ...
if ($path === '/admin/users') {
    $controller = new \User\Controllers\AdminList();
    $controller->listAction();
}

// User delete action ...
if ($path === '/admin/users/delete_action' && $method === 'GET') {
    $controller = new \User\Controllers\AdminList();
    $controller->deleteAction();
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

// Advert list ...
if ($path === '/admin/adverts' && $method === 'GET') {
    $controller = new \Advert\Controllers\AdminList();
    $controller->listAction();
}

// Advert delete action ...
if ($path === '/admin/adverts/delete_action' && $method === 'GET') {
    $controller = new \Advert\Controllers\AdminList();
    $controller->deleteAction();
}

// Advert add form ...
if ($path === '/admin/adverts/add' && $method === 'GET') {
    $controller = new \Advert\Controllers\AdminAdd();
    $controller->AddForm();
}

// Advert add action ...
if ($path === '/admin/adverts/add_action' && $method === 'POST') {
    $controller = new \Advert\Controllers\AdminAdd();
    $controller->AddAction();
}

// Advert edit form ...
if ($path === '/admin/adverts/edit' && $method === 'GET') {
    $controller = new \Advert\Controllers\AdminEdit();
    $controller->editForm();
}

// Advert edit action ...
if ($path === '/admin/adverts/edit_action' && $method === 'POST') {
    $controller = new \Advert\Controllers\AdminEdit();
    $controller->editAction();
}