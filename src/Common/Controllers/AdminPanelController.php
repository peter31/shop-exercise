<?php

namespace Common\Controllers;

use Common\Controllers\AdminAbstractController;


class AdminPanelController extends AdminAbstractController
{
    public function controlPanel()
    {
        $title = 'Control Panel';
        require dirname(__DIR__) . '/Resources/templates/admin/panel.php';
    }
}