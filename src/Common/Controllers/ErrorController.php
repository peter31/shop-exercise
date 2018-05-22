<?php
namespace Common\Controllers;

class ErrorController extends AdminAbstractController
{
    public function notFoundAction()
    {
        header("HTTP/1.0 404 Not Found", true, 404);

        $this->twig->display('@Common/404.html.twig');
    }
}
