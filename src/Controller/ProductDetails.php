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
        if (!isset($_GET['pid'])) {
            throw new \Exception('No Product selected.');
        }
        $id = (int) $_GET['pid'];

        $this->view->addTemplate('productDetails.tpl');
        $this->view->addTlpParam('headline', 'Product Details');
        $this->view->addTlpParam('info', 'All infos about your product:');
        $this->view->addTlpParam('allProducts', $this->productRepository->getList());
        $this->view->addTlpParam('singleProduct', $this->productRepository->get($id));
    }
}