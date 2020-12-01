<?php

namespace App\Controller;

use App\Service\ViewInterface;
use App\Service\View;


class Fruits implements Controller
{
    private ViewInterface $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action(): void
    {
        $this->view->addTemplate('layout.tpl');
        $this->view->addTlpParam('headline', 'Fruits');
        $this->view->addTlpParam('info', 'Hey');
        $this->view->addTlpParam('name', 'Apple');
        $this->view->display();
    }
}