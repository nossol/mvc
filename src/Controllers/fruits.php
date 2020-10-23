<?php


namespace App\Controllers;


class fruits extends PageController
{
    public function action(): void
    {
        $this->smarty->assign('name', 'DOOM GUY');

        try {
            $this->smarty->display('fruits.tpl');
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }
}