<?php
namespace Common\Controllers;

use Common\DB;

class AbstractController
{
    protected $mysql;

    public function __construct()
    {
        $this->mysql = DB::connect();

        $basePath = dirname(dirname(__DIR__));
        $loadersArr = [];

        foreach (['Advert', 'Common', 'User'] as $module) {
            $loader = new \Twig_Loader_Filesystem();
            $loader->addPath($basePath . '/' . $module . '/Resources/templates', $module);
            $loadersArr[] = $loader;
        }

        $this->twig = new \Twig_Environment(
            new \Twig_Loader_Chain($loadersArr),
            [
                'cache' => dirname(dirname(dirname(__DIR__))) . '/var/cache',
                'auto_reload' => true,
                'strict_variables' => true,
            ]
        );
        $this->twig->addGlobal('session', $_SESSION);
    }

    public function show404()
    {
        header("HTTP/1.0 404 Not Found", true, 404);

        $this->twig->display('@Common/404.html.twig');
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
    }
}
