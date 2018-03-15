<?php
namespace Common;

class Router
{
    public function getControllerData(string $path, string $method): array
    {
        // Users list ...
        if ($path === '/admin/users' && $method === 'GET') {
            return [
                \User\Controllers\AdminListController::class,
                'listAction'
            ];
        }

        // User delete action ...
        if ($path === '/admin/users/delete_action' && $method === 'GET') {
            return [
                \User\Controllers\AdminListController::class,
                'deleteAction'
            ];
        }

        // User add form ...
        if ($path === '/admin/users/add' && $method === 'GET') {
            return [
                \User\Controllers\AdminAddController::class,
                'addForm'
            ];
        }

        // User add action ...
        if ($path === '/admin/users/add_action' && $method === 'POST') {
            return [
                \User\Controllers\AdminAddController::class,
                'addAction'
            ];
        }

        // User edit form ...
        if ($path === '/admin/users/edit' && $method === 'GET') {
            return [
                \User\Controllers\AdminEditController::class,
                'editForm'
            ];
        }

        // User edit action ...
        if ($path === '/admin/users/edit_action' && $method === 'POST') {
            return [
                \User\Controllers\AdminEditController::class,
                'editAction'
            ];
        }

// Get CSV file ...
        if ($path === '/admin/users/csv' && $method === 'GET') {
            $controller = new \User\Controllers\AdminCSVController();
            $controller->getCSV();
        }

// Send CSV file ...
        if ($path === '/admin/users/csv_action' && $method === 'POST') {
            $controller = new \User\Controllers\AdminCSVController();
            $controller->sendCSV();
        }

// Advert list ...
        if ($path === '/admin/adverts' && $method === 'GET') {
            $controller = new \Advert\Controllers\AdminListController();
            $controller->listAction();
        }

// Advert delete action ...
        if ($path === '/admin/adverts/delete_action' && $method === 'GET') {
            $controller = new \Advert\Controllers\AdminListController();
            $controller->deleteAction();
        }

// Advert add form ...
        if ($path === '/admin/adverts/add' && $method === 'GET') {
            $controller = new \Advert\Controllers\AdminAddController();
            $controller->addForm();
        }

// Advert add action ...
        if ($path === '/admin/adverts/add_action' && $method === 'POST') {
            $controller = new \Advert\Controllers\AdminAddController();
            $controller->addAction();
        }

// Advert edit form ...
        if ($path === '/admin/adverts/edit' && $method === 'GET') {
            $controller = new \Advert\Controllers\AdminEditController();
            $controller->editForm();
        }

// Advert edit action ...
        if ($path === '/admin/adverts/edit_action' && $method === 'POST') {
            $controller = new \Advert\Controllers\AdminEditController();
            $controller->editAction();
        }
    }
}
