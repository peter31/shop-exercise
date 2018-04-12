<?php
namespace Advert\Controllers;

use Common\Controllers\AdminAbstractController;

class AdminAddController extends AdminAbstractController
{
    public function addForm()
    {
        include dirname(__DIR__) . '/Resources/templates/admin/add.php';
    }

    public function addAction()
    {
        $errors = advertAddValidation($_POST);

        if (count($errors) > 0) {

            include dirname(__DIR__) . '/Resources/templates/admin/add.php';
        } else {
            $sqlQuery = sprintf(
                'INSERT INTO adverts SET title = "%s", message = "%s", phone = "%s"',
                $this->mysql->escape_string($_POST['title']),
                $this->mysql->escape_string($_POST['message']),
                $this->mysql->escape_string($_POST['phone'])
            );
            $this->mysql->query($sqlQuery);
            $userResultString = 'Advert is added';
            include dirname(__DIR__) . '/Resources/templates/admin/add_action.php';
        }
     }
}