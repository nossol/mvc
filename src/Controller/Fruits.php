<?php

namespace App\Controller;


class Fruits extends PageController
{
    public function action(): void
    {
        $this->smarty->assign('headline', 'FRUITS');
        $this->smarty->assign('info', 'Eat more');
        $this->smarty->assign('name', 'apples!');

        try {
            $this->smarty->display('layout.tpl');
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }
}