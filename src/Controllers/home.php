<?php


namespace App\Controllers;


class home extends PageController
{
    public function action(): void
    {
        $this->smarty->assign('name', 'General McNugget');

        try {
            $this->smarty->display('home.tpl');
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }
}

