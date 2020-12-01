<?php

namespace App\Controller;

use App\Service\View;
use App\Service\ViewController;


class About implements Controller
{
    private View $view;

    public function __construct()
    {
        $this->view = new ViewController();
    }

    public function action(): void
    {
        $this->view->addTemplate('about.tpl');
        $this->view->addTlpParam('headline', 'About');
        $this->view->addTlpParam('info', 'We are');
        $this->view->addTlpParam('name', 'Nexus');
        $this->view->display();
    }
}

