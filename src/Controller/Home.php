<?php

namespace App\Controller;

use App\Service\ViewInterface;
use App\Service\View;


class Home implements Controller
{
    private ViewInterface $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action(): void
    {
        $this->view->addTemplate('layout.tpl');
        $this->view->addTlpParam('headline', 'Home');
        $this->view->addTlpParam('info', 'Welcome');
        $this->view->addTlpParam('name', 'User');
        $this->view->display();
    }
}

