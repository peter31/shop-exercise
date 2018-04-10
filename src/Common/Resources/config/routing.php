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

$routing[] = [
    'path' => '/user/registration',
    'method' => 'GET',
    'controllerClass' => \Common\Controllers\AuthController::class,
    'controllerMethod' => 'registration'
];

$routing[] = [
    'path' => '/user/login',
    'method' => 'GET',
    'controllerClass' => \Common\Controllers\AuthController::class,
    'controllerMethod' => 'logIn'
];

$routing[] = [
    'path' => '/user/login',
    'method' => 'POST',
    'controllerClass' => \Common\Controllers\AuthController::class,
    'controllerMethod' => 'logInAction'
];

$routing[] = [
    'path' => '/user/logout',
    'method' => 'GET',
    'controllerClass' => \Common\Controllers\AuthController::class,
    'controllerMethod' => 'logOutAction'
];