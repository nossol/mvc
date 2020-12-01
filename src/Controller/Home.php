<?php

namespace App\Controller;

use App\Service\View;
use App\Service\ViewController;


class Home implements Controller
{
    private View $view;

    public function __construct()
    {
        $this->view = new ViewController();
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

