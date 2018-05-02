<?php
namespace Advert\Controllers;

use Common\Controllers\AdminAbstractController;

class AdminEditController extends AdminAbstractController
{
    public function editForm()
    {
        $sqlQuery = sprintf('SELECT * FROM adverts WHERE id = "%d"', $this->mysql->escape_string($_GET['id']));
        $advert   = $this->mysql->query($sqlQuery)->fetch_assoc();

        if (array_key_exists('saved_data', $_SESSION)) {
            $advert = array_merge($advert, $_SESSION['saved_data']['advert']);
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        include dirname(__DIR__) . '/Resources/templates/admin/edit.php';
    }

    private function advertEditValidation($arr)
    {
        $errors = [];

        if ( empty($arr['title']) || empty($arr['message']) || empty($arr['phone']) ) {
            $errors[] = 'All fields must be completed';
        }

        if (empty($_POST['id'])) {
            $errors[] = 'ID is empty';
        } else {
            $sqlQuery = sprintf('SELECT * FROM adverts WHERE id = "%d"', $this->mysql->escape_string($_POST['id']));
            $result = $this->mysql->query($sqlQuery);

            if ($result->num_rows === 0) {
                $errors[] = 'Advert with this id does not exist';
            }
        }

        return $errors;
    }

    public function editAction()
    {
        $errors = $this->advertEditValidation($_POST);

        if (count($errors) > 0) {
            $_SESSION['saved_data']['advert'] = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;
            header('Location: /admin/adverts/edit?id=' . $_POST['id']);
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
            include dirname(__DIR__) . '/Resources/templates/admin/add_action.php';
        }
    }
}