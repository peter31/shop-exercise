<?php
namespace Advert\Controllers;

use Common\Controllers\AbstractController;

class AdminEditController extends AbstractController
{
    public function editForm()
    {
        $sqlQuery = sprintf('SELECT * FROM adverts WHERE id = "%d"', $this->mysql->escape_string($_GET['id']));
        $result = $this->mysql->query($sqlQuery);
        $advert = $result->fetch_assoc();
        include dirname(__DIR__) . '/Resources/templates/edit.php';
    }

    public function editAction()
    {
        $errors = advertAddValidation($_POST);

        if (empty($_POST['id'])) {
            $errors[] = 'ID is empty';
        } else {
            $sqlQuery = sprintf('SELECT * FROM adverts WHERE id = "%d"', $this->mysql->escape_string($_POST['id']));
            $result = $this->mysql->query($sqlQuery);

            if ($result->num_rows === 0) {
                $errors[] = 'Advert with this id does not exist';
            }
        }

        if (count($errors) > 0) {
            include dirname(__DIR__) . '/Resources/templates/add.php';
        } else {
            $sqlQuery = sprintf(
                'UPDATE adverts SET title = "%s", message = "%s", phone = "%s", status = "%s" WHERE id = "%d"',
                $this->mysql->escape_string($_POST['title']),
                $this->mysql->escape_string($_POST['message']),
                $this->mysql->escape_string($_POST['phone']),
                $this->mysql->escape_string($_POST['status']),
                $this->mysql->escape_string($_POST['id'])
            );
            $this->mysql->query($sqlQuery);
            $userResultString = 'Advert was changed';
            include dirname(__DIR__) . '/Resources/templates/add_action.php';
        }
    }
}