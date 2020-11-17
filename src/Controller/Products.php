<?php

namespace App\Controller;

use App\Model\ProductRepository;


class Products extends PageController
{
    private ProductRepository $ProductRepository;

    public function __construct()
    {
        parent::__construct();
        $this->ProductRepository = new ProductRepository();
    }

    public function action(): void
    {
        $this->smarty->assign('headline', 'PRODUCTS');
        $this->smarty->assign('info', 'Product Overview');
        $this->smarty->assign('name', 'Every Product!');
        $this->smarty->assign('myProducts', $this->ProductRepository->getList());

        try {
            $this->smarty->display('products.tpl');
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }
}