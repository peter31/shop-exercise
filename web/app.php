<?php

error_reporting(E_ALL & ~E_STRICT);
ini_set('display_errors', 1);

require_once dirname(__DIR__) . '/src/Common/functions.php';
spl_autoload_register('autoload');

list($path) = explode('?', $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];

$router = new \Common\Router();
$controllerData = $router->getControllerData($path, $method);

$controllerClass = $controllerData[0];
$controllerMethod = $controllerData[1];

$controller = new $controllerClass();
$controller->{$controllerMethod}();
