<?php declare(strict_types=1);


namespace App\Controller\Frontend;

use App\Service\View;
use App\Service\Container;
use App\Model\UserRepository;
use App\Controller\Controller;


class Users implements Controller
{
    private View $view;
    private UserRepository $userRepository;

    public const ROUTE = 'users';

    /**
     * Users constructor.
     * @param Container $container
     * @throws \Exception
     */
    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
        $this->userRepository = $container->get(UserRepository::class);
    }

    /**
     *
     */
    public function action(): void
    {
        $this->view->addTemplate('users.tpl');
        $this->view->addTlpParam('headline', 'Users');
        $this->view->addTlpParam('info', 'Users list:');
        $this->view->addTlpParam('allUsers', $this->userRepository->getUserList());
    }
}