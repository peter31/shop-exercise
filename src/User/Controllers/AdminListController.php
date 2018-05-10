<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;
use User\Traits\GetUserManagerTrait;

class AdminListController extends AdminAbstractController
{
    use GetUserManagerTrait;

    public function listAction()
    {
        $users = $this->getUserManager()->getAll();

        require dirname(__DIR__) . '/Resources/templates/admin/list.php';
    }

    public function deleteAction()
    {
        $this->getUserManager()->deleteById($_GET['id']);

        $this->redirect('/admin/users');

    }
}
