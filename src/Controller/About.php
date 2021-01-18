<?php

namespace App\Controller;

use App\Service\View;
use App\Service\Container;


class About implements Controller
{
    private View $view;
    public const ROUTE = 'about';

    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
    }

    public function action(): void
    {
        $this->view->addTemplate('about.tpl');
        $this->view->addTlpParam('headline', 'About');
        $this->view->addTlpParam('info', 'We are Nexus');
    }
}

