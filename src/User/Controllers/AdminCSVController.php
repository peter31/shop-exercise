<?php
namespace User\Controllers;

use Common\Constraints\FileExtension;
use Common\Constraints\FileNotBlank;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Common\Controllers\AdminAbstractController;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Validation;
use User\Traits\GetUserManagerTrait;


//use Common\Validator\Validator;
//use Common\Validator\Strategy\EmailFormat;
//use Common\Validator\Strategy\FileExtension;
//use Common\Validator\Strategy\FileNotBlank;
//use Common\Validator\Strategy\NotBlank;

class AdminCSVController extends AdminAbstractController
{
    use GetUserManagerTrait;

    public function getCSV()
    {
        $errors = [];

        if (array_key_exists('saved_data', $_SESSION)) {
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        $this->twig->display('@User/admin/csv.html.twig', [
            'errors' => $errors,
        ]);
    }

    public function actionCSV()
    {
        $users = [];
        $total = 0;
        $incorrectRows = 0;
        $added = 0;
        $updated = 0;

        $validator = Validation::createValidator();

        $constraints = new Collection([
            'browse_csv' => [new FileNotBlank(), new FileExtension(['ext' => 'csv'])]
        ]);

        $errors = $validator->validate($_FILES, $constraints);

        if (count($errors)) {
            $_SESSION['saved_data']['errors'] = $errors;

            $this->redirect('/admin/users/csv');
        } else {
            $take = fopen($_FILES['browse_csv']['tmp_name'], 'rb');


            $validator = Validation::createValidator();

            $constraints = new Collection([
                'name'  => [new NotBlank()],
                'email' => [new NotBlank(), new Email()]
            ]);

            $errors = $validator->validate($_FILES, $constraints);

            while (($userRow = fgetcsv($take)) !== false) {
                $errors = $validator->validate(['name' => $userRow[0], 'email' => $userRow[1]], $constraints);
                $total++;
                if (!count($errors)) {
                    $users[] = $userRow;
                } else {
                    $incorrectRows++;
                }
            }
            fclose($take);
        }

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

        $this->twig->display('@User/admin/csv_action.html.twig', [
            'total'     => $total,
            'incorrect' => $incorrectRows,
            'added'     => $added,
            'updated'   => $updated
        ]);
    }
}