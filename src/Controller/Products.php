<?php

namespace App\Controller;

use App\Model\ProductRepository;
use App\Service\View;
use App\Service\ViewInterface;


class Products implements Controller
{
    private ViewInterface $view;
    private ProductRepository $ProductRepository;

    public function __construct()
    {
        $this->view = new View();
        $this->ProductRepository = new ProductRepository();
    }

    public function action(): void
    {
        $this->view->addTemplate('products.tpl');
        $this->view->addTlpParam('headline', 'Products');
        $this->view->addTlpParam('info', 'Every Product');
        $this->view->addTlpParam('name', 'Complete List:');
        $this->view->addTlpParam('myProducts', $this->ProductRepository->getProductList());
        $this->view->display();
    }
}

