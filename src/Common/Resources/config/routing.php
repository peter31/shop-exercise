<?php

/**
 * ADMIN SECTION --------------------
*/

//$routing[] = [
//    'path' => '/admin',
//    'method' => 'GET',
//    'controllerClass' => \Common\Controllers\AdminDashboardController::class,
//    'controllerMethod' => 'adminDashboard'
//];

$routing[] = [
    'path' => '/admin/login',
    'method' => 'GET',
    'controllerClass' => \Common\Controllers\AdminAuthController::class,
    'controllerMethod' => 'logIn'
];

$routing[] = [
    'path' => '/admin/login',
    'method' => 'POST',
    'controllerClass' => \Common\Controllers\AdminAuthController::class,
    'controllerMethod' => 'logInAction'
];

$routing[] = [
    'path' => '/admin/logout',
    'method' => 'GET',
    'controllerClass' => \Common\Controllers\AdminAuthController::class,
    'controllerMethod' => 'logOutAction'
];

/**
 * USER SECTION --------------------
 */

// Advert list ...
$routing[] = [
    'path' => '/',
    'method' => 'GET',
    'controllerClass' => \Common\Controllers\MainController::class,
    'controllerMethod' => 'listAction'
];

$routing[] = [
    'path' => '/advert/item',
    'method' => 'GET',
    'controllerClass' => \Common\Controllers\MainController::class,
    'controllerMethod' => 'viewAction'
];

