<?php declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Service\View;

use App\Service\Container;
use App\Controller\Controller;
use App\Model\ProductRepository;


class Products implements Controller
{
    private View $view;
    private ProductRepository $productRepository;

    public const ROUTE = 'products';

    /**
     * Products constructor.
     * @param Container $container
     * @throws \Exception
     */
    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
        $this->productRepository = $container->get(ProductRepository::class);
    }

    /**
     *
     */
    public function action(): void
    {
        $this->view->addTemplate('products.tpl');
        $this->view->addTlpParam('headline', 'Products');
        $this->view->addTlpParam('info', 'Product list:');
        $this->view->addTlpParam('allProducts', $this->productRepository->getList());
        $this->view->addTlpParam('hasProduct', $this->productRepository->hasProduct(2));
    }
}

