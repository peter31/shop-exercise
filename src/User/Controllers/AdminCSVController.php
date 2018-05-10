<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;
use User\Traits\GetUserManagerTrait;

use Common\Validator\Validator;
use Common\Validator\Strategy\EmailFormat;
use Common\Validator\Strategy\FileExtension;
use Common\Validator\Strategy\FileNotBlank;
use Common\Validator\Strategy\NotBlank;

class AdminCSVController extends AdminAbstractController
{
    use GetUserManagerTrait;

    public function getCSV()
    {
        if (array_key_exists('saved_data', $_SESSION)) {
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        include dirname(__DIR__) . '/Resources/templates/admin/csv.php';
    }

    public function actionCSV()
    {
        $validator = new Validator([
            'browse_csv' => [new FileNotBlank(), new FileExtension('csv')]
        ]);

        $errors = $validator->validate($_FILES);

        if (count($errors)) {
            $_SESSION['saved_data']['errors'] = $errors;

            $this->redirect('/admin/users/csv');
        } else {
            $take = fopen($_FILES['browse_csv']['tmp_name'], 'rb');

            $validator = new Validator([
                'name'  => [new NotBlank()],
                'email' => [new NotBlank(), new EmailFormat()]
            ]);

            $incorrectRows = 0;
            while (($usersRow = fgetcsv($take)) !== false) {
                $errors = $validator->validate(['name' => $usersRow[0], 'email' => $usersRow[1]]);
                if (!count($errors)) {
                    $users[] = $usersRow;
                } else {
                    $incorrectRows++;
                }
            }
            fclose($take);
        }

        $total = count($users);
        $added = 0;
        $updated = 0;

        foreach ($users as $key => $value) {
            $result = $this->getUserManager()->getByEmail($value[1]);

            if ($result->num_rows === 0) {
                $this->getUserManager()->createItemCsv([$value[0], $value[1]]);
                $added++;
            } else {
                $this->getUserManager()->updateItemCsv([$value[0], $value[1]]);
                $updated++;
            }
        }

        include dirname(__DIR__) . '/Resources/templates/admin/csv_action.php';
    }
}