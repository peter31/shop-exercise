<?php

error_reporting(E_ALL & ~E_STRICT);
ini_set('display_errors', 1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

list($path) = explode('?', $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];

$router = new \Common\Router();
list($controllerClass, $controllerMethod) = $router->getControllerData($path, $method);

session_start();

$controller = new $controllerClass();
$controller->$controllerMethod();

\Common\DB::close();
