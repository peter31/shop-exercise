<?php
namespace User\Controllers;

use Common\Controllers\AdminAbstractController;
use User\Traits\GetUserManagerTrait;

use TelegramBot\Api\BotApi;

class AdminListController extends AdminAbstractController
{
    use GetUserManagerTrait;

    public function listAction()
    {
        $this->twig->display('@User/admin/list.html.twig', [
            'users' => $this->getUserManager()->getAll()
        ]);

//        $bot = new BotApi('547386859:AAGFMJWe9b73ViLed5lem97vX3WgeuB3AJc');
//
//        $chatId = -304306979;
//
//        $messageText = 'New user was added';
//
//        $bot->sendMessage($chatId, $messageText);
    }

    public function deleteAction()
    {
        $this->getUserManager()->deleteById($_GET['id']);

        $this->redirect('/admin/users');

    }
}
