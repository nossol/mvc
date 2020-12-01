<?php

namespace App\Controller;

use App\Service\ViewInterface;
use App\Service\View;


class About implements Controller
{
    private ViewInterface $view;

    public function __construct()
    {
        $this->view = new View();
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

