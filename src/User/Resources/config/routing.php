<?php

$routing[] = [
    'path' => '/admin/users',
    'method' => 'GET',
    'controllerClass' => \User\Controllers\AdminListController::class,
    'controllerMethod' => 'listAction'
];

$routing[] = [
    'path' => '/admin/users/delete_action',
    'method' => 'GET',
    'controllerClass' => \User\Controllers\AdminListController::class,
    'controllerMethod' => 'deleteAction'
];

// User add form ...
$routing[] = [
    'path' => '/admin/users/add',
    'method' => 'GET',
    'controllerClass' => \User\Controllers\AdminAddController::class,
    'controllerMethod' => 'addForm'
];

// User add action ...
$routing[] = [
    'path' => '/admin/users/add_action',
    'method' => 'POST',
    'controllerClass' => \User\Controllers\AdminAddController::class,
    'controllerMethod' => 'addAction'
];

// User edit form ...
$routing[] = [
    'path' => '/admin/users/edit',
    'method' => 'GET',
    'controllerClass' => \User\Controllers\AdminEditController::class,
    'controllerMethod' => 'editForm'
];

// User edit action ...
$routing[] = [
    'path' => '/admin/users/edit_action',
    'method' => 'POST',
    'controllerClass' => \User\Controllers\AdminEditController::class,
    'controllerMethod' => 'editAction'
];

// Get CSV file ...
$routing[] = [
    'path' => '/admin/users/csv',
    'method' => 'GET',
    'controllerClass' => \User\Controllers\AdminCSVController::class,
    'controllerMethod' => 'getCSV'
];

// Send CSV file ...
$routing[] = [
    'path' => '/admin/users/csv_action',
    'method' => 'POST',
    'controllerClass' => \User\Controllers\AdminCSVController::class,
    'controllerMethod' => 'actionCSV'
];

$routing[] = [
    'path' => '/user/login',
    'method' => 'GET',
    'controllerClass' => \User\Controllers\AuthController::class,
    'controllerMethod' => 'logIn'
];

$routing[] = [
    'path' => '/user/login',
    'method' => 'POST',
    'controllerClass' => \User\Controllers\AuthController::class,
    'controllerMethod' => 'logInAction'
];

$routing[] = [
    'path' => '/user/logout',
    'method' => 'GET',
    'controllerClass' => \User\Controllers\AuthController::class,
    'controllerMethod' => 'logoutAction'
];

$routing[] = [
    'path' => '/user/registration',
    'method' => 'GET',
    'controllerClass' => \User\Controllers\AuthController::class,
    'controllerMethod' => 'registration'
];

$routing[] = [
    'path' => '/user/registration',
    'method' => 'POST',
    'controllerClass' => \User\Controllers\AuthController::class,
    'controllerMethod' => 'registrationAction'
];