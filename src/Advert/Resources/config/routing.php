<?php

// Advert list ...
$routing[] = [
    'path' => '/admin/adverts',
    'method' => 'GET',
    'controllerClass' => \Advert\Controllers\AdminListController::class,
    'controllerMethod' => 'listAction'
];

// Advert delete action ...
$routing[] = [
    'path' => '/admin/adverts/delete_action',
    'method' => 'GET',
    'controllerClass' => \Advert\Controllers\AdminListController::class,
    'controllerMethod' => 'deleteAction'
];

// Advert add form ...
$routing[] = [
    'path' => '/admin/adverts/add',
    'method' => 'GET',
    'controllerClass' => \Advert\Controllers\AdminAddController::class,
    'controllerMethod' => 'addForm'
];

// Advert add action ...
$routing[] = [
    'path' => '/admin/adverts/add_action',
    'method' => 'POST',
    'controllerClass' => \Advert\Controllers\AdminAddController::class,
    'controllerMethod' => 'addAction'
];

// Advert edit form ...
$routing[] = [
    'path' => '/admin/adverts/edit',
    'method' => 'GET',
    'controllerClass' => \Advert\Controllers\AdminEditController::class,
    'controllerMethod' => 'editForm'
];

// Advert edit action ...
$routing[] = [
    'path' => '/admin/adverts/edit_action',
    'method' => 'POST',
    'controllerClass' => \Advert\Controllers\AdminEditController::class,
    'controllerMethod' => 'editAction'
];
