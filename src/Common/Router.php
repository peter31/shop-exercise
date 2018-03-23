<?php

namespace Common;

class Router
{
    private function getConfig()
    {
        require dirname(__DIR__, 2) . '/config/routing.php';

        return $routing;
    }

    public function getControllerData(string $path, string $method): array
    {
        $config = $this->getConfig();

        foreach ($config as $route) {
            if ($path === $route['path'] && $method === $route['method']) {
                return [
                    $route['controllerClass'],
                    $route['controllerMethod']
                ];
            }
        }

        return [\Common\Controllers\ErrorController::class, 'notFoundAction'];
    }
}