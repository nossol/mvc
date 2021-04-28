<?php declare(strict_types=1);


namespace App\Controller\Frontend;

use App\Service\View;
use App\Service\Container;
use App\Controller\Controller;


class About implements Controller
{
    private View $view;
    public const ROUTE = 'about';

    /**
     * About constructor.
     * @param Container $container
     * @throws \Exception
     */
    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
    }

    /**
     *
     */
    public function action(): void
    {
        $this->view->addTemplate('about.tpl');
        $this->view->addTlpParam('headline', 'About');
        $this->view->addTlpParam('info', 'We are Nexus');
    }
}

