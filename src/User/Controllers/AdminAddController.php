<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;
use User\Traits\GetUserManagerTrait;

use Common\Validator\Validator;
use Common\Validator\Strategy\EmailFormat;
use Common\Validator\Strategy\NotBlank;
use Common\Validator\Strategy\Unique;
use TelegramBot\Api\BotApi;

class AdminAddController extends AdminAbstractController
{
    use GetUserManagerTrait;

    public function addForm()
    {
        if (array_key_exists('saved_data', $_SESSION)) {
            $user   = $_SESSION['saved_data']['item'];
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        include dirname(__DIR__) . '/Resources/templates/admin/add.php';
    }

    public function addAction()
    {
        $validator = new Validator([
            'name'     => [new NotBlank()],
            'email'    => [new NotBlank(), new EmailFormat(), new Unique('users')],
            'password' => [new NotBlank()],
        ]);
        $errors = $validator->validate($_POST);

        if (!empty($errors)) {
            $_SESSION['saved_data']['item']   = $_POST;
            $_SESSION['saved_data']['errors'] = $errors;
            $this->redirect('/admin/users/add');
        } else {
            $this->getUserManager()->createItem($_POST);

            $bot = new BotApi('453057456:AAHpR4Gi5aYGoCjJsng0NBFrh3yCNm_lCLw');

            $chatId = 541276219;

            $messageText = 'New user was added';

            $bot->sendMessage($chatId, $messageText);

            $userResultString = 'New user was added';

            include dirname(__DIR__) . '/Resources/templates/admin/add_action.php';
        }
    }
}
