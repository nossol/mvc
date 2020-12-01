<?php

namespace App\Controller;

use App\Service\View;
use App\Service\ViewController;


class Fruits implements Controller
{
    private View $view;

    public function __construct()
    {
        $this->view = new ViewController();
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