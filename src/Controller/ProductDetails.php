<?php

namespace App\Controller;

use App\Model\ProductRepository;
use App\Service\Container;
use App\Service\View;


class ProductDetails implements Controller
{
    private View $view;
    private ProductRepository $productRepository;
    public const ROUTE = 'productDetails';

    public function __construct(Container $container, ProductRepository $productRepository)
    {
        $this->view = $container->get(View::class);
        $this->productRepository = $productRepository;
    }

    public function action(): void
    {
        $id = (int) $_GET['pid'];

        if (isset($_GET['pid']) && $this->productRepository->hasProduct($id)) {
            $this->view->addTemplate('productDetails.tpl');
            $this->view->addTlpParam('headline', 'Product Details');
            $this->view->addTlpParam('info', 'All infos about your product:');
            $this->view->addTlpParam('singleProduct', $this->productRepository->get($id));
        } else {
            $this->view->addTemplate('404.tpl');
            $this->view->addTlpParam('headline', 'ERROR 404');
            $this->view->addTlpParam('info', 'Product not found');
        }
    }
}