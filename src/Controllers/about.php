<?php


namespace App\Controllers;


class about extends PageController
{
    public function action(): void
    {
        $this->smarty->assign('headline', 'ABOUT');
        $this->smarty->assign('info', 'Our Culture at');
        $this->smarty->assign('name', 'Nexus');

        try {
            $this->smarty->display('layout.tpl');
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }
}


