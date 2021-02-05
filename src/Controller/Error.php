<?php


namespace App\Controller;

use App\Service\Container;
use App\Service\View;


class Error implements Controller
{
    private View $view;
    public const ROUTE = 'error';

    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
    }

    public function action(): void
    {
        $this->view->addTemplate('404.tpl');
        $this->view->addTlpParam('headline', 'ERROR 404');
        $this->view->addTlpParam('info', 'Page not found');
    }
}