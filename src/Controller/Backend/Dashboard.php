<?php declare(strict_types=1);


namespace App\Controller\Backend;


use App\Controller\BackendController;
use App\Service\Container;
use App\Service\SessionUser;
use App\Service\View;


class Dashboard implements BackendController
{
    private View $view;
    private SessionUser $sessionUser;

    public const ROUTE = 'dashboard';

    /**
     * Dashboard constructor.
     * @param Container $container
     * @throws \Exception
     */
    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
        $this->sessionUser = $container->get(SessionUser::class);
    }

    /**
     * @param string $route
     */
    public function redirectToPage(string $route):void
    {
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra1 = 'index.php?page='.$route;
        $extra2 = '&admin=true';
        header("Location: $uri$extra1$extra2");
        exit;
    }

    /**
     *
     */
    public function init(): void
    {
        if (!$this->sessionUser->isLoggedIn()) {
            $this->redirectToPage(Login::ROUTE);
        }
    }

    /**
     *
     */
    public function action(): void
    {
        $this->view->addTemplate('dashboard.tpl');
        if (!empty($_POST)) {
            if (!empty($_POST['logout'])) {
                $this->logout();
            }
        }
    }

    /**
     *
     */
    private function logout():void
    {
        session_unset();
        session_destroy();
        $this->redirectToPage(Login::ROUTE);
    }
}