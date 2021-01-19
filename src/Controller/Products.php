<?php

namespace App\Controller;

use App\Model\ProductRepository;
use App\Service\Container;
use App\Service\View;


class Products implements Controller
{
    private View $view;
    private ProductRepository $productRepository;

    public const ROUTE = 'products';

    public function __construct(Container $container, ProductRepository $productRepository)
    {
        $this->view = $container->get(View::class);
        $this->productRepository = $productRepository;
    }

    public function action(): void
    {
        $this->view->addTemplate('products.tpl');
        $this->view->addTlpParam('headline', 'Products');
        $this->view->addTlpParam('info', 'get product list:');
        $this->view->addTlpParam('allProducts', $this->productRepository->getProductList());
        $this->view->addTlpParam('getProduct', 'get product:');
        $this->view->addTlpParam('singleProduct', $this->productRepository->getProduct());
        $this->view->addTlpParam('product', 'has product?');
        $this->view->addTlpParam('hasProduct', $this->productRepository->hasProduct(4));
    }
}

