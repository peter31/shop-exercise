<?php

namespace Common\Controllers;

use Common\Controllers\AdminAbstractController;


class AdminPanelController extends AdminAbstractController
{
    public function controlPanel()
    {
        $title = 'Control Panel';

        $this->twig->display('@Common/admin/panel.html.twig', [
            'title' => $title
        ]);
    }
}