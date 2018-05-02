<?php

function autoload($className)
{
    $classArr = explode('\\', $className);
    $path = dirname(__DIR__, 2) . '/src/' . implode('/', $classArr) . '.php';
    require_once $path;
}
