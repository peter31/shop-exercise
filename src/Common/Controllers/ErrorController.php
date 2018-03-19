<?php
namespace Common\Controllers;

class ErrorController extends AbstractController
{
    public function notFoundAction()
    {
        header("HTTP/1.0 404 Not Found", true, 404);

        include dirname(__DIR__) . '/Resources/templates/404.php';
    }
}