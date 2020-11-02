<?php


namespace App\Controllers;


class home extends PageController
{
    public function action(): void
    {
        $this->smarty->assign('headline', 'HOME', );
        $this->smarty->assign('info', 'Hello,', );
        $this->smarty->assign('name', 'General McNugget');

        try {
            $this->smarty->display('layout.tpl');
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }
}

