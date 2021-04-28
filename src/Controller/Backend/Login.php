<?php declare(strict_types=1);


namespace App\Controller\Backend;


use App\Controller\BackendController;
use App\Service\View;
use App\Model\UserRepository;
use App\Service\Container;
use App\Service\SessionUser;

class Login implements BackendController
{
    private View $view;
    private userRepository $userRepository;
    private SessionUser $sessionUser;

    public const ROUTE = 'login';

    /**
     * Login constructor.
     * @param Container $container
     * @throws \Exception
     */
    public function __construct(Container $container)
    {
        $this->sessionUser = $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
        $this->userRepository = $container->get(UserRepository::class);
    }

    /**
     *
     */
    public function init(): void
    {
        if ($this->sessionUser->isLoggedIn()) {
            $this->redirectToDashboard();
        }
    }

    /**
     *
     */
    public function action(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                if ($this->userRepository->hasUser($username, $password)) {
                    $this->sessionUser->setUser($username);
                    $_SESSION['loggedin'] = true;
                    $this->redirectToDashboard();
                }
                $this->view->addTlpParam('error', 'Invalid Username or Password');
            }
        }
        $this->view->addTemplate('login.tpl');
        $this->view->addTlpParam('headline', 'Login');
        $this->view->addTlpParam('info', 'Please enter your username and password:');
    }

    /**
     *
     */
    private function redirectToDashboard():void
    {
        $extra1 = 'index.php?page='.Dashboard::ROUTE;
        $extra2 = '&admin=true';
        header("Location: $extra1$extra2");
        exit;
    }
}