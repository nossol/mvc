<?php declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Model\ProductRepository;
use App\Service\Container;
use App\Service\View;
use App\Controller\Controller;


class ProductDetails implements Controller
{
    private View $view;
    private ProductRepository $productRepository;
    public const ROUTE = 'productDetails';

    /**
     * ProductDetails constructor.
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
        $id = 0;

        if (isset($_GET['pid'])) {
            $id = (int)$_GET['pid'];
        }

        if ($id > 0 && $this->productRepository->hasProduct($id)) {
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