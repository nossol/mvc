<?php


namespace App\Controllers;


class about extends PageController
{
    public function action(): void
    {
        $this->smarty->assign('name', 'Nexus');

        try {
            $this->smarty->display('about.tpl');
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }
}


