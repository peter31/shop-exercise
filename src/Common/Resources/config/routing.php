<?php

/**
 * ADMIN SECTION
 */

$routing[] = [
    'path' => '/admin',
    'method' => 'GET',
    'controllerClass' => \Common\Controllers\AdminPanelController::class,
    'controllerMethod' => 'controlPanel'
];

$routing[] = [
    'path' => '/admin/login',
    'method' => 'GET',
    'controllerClass' => \Common\Controllers\AdminAuthController::class,
    'controllerMethod' => 'login'
];

$routing[] = [
    'path' => '/admin/login',
    'method' => 'POST',
    'controllerClass' => \Common\Controllers\AdminAuthController::class,
    'controllerMethod' => 'loginAction'
];

$routing[] = [
    'path' => '/admin/logout',
    'method' => 'GET',
    'controllerClass' => \Common\Controllers\AdminAuthController::class,
    'controllerMethod' => 'logoutAction'
];

/**
 * USER SECTION
 */
