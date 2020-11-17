<?php

namespace App\Controller;


class About extends PageController
{
    public function action(): void
    {
        $this->smarty->assign('headline', 'ABOUT');
        $this->smarty->assign('info', 'Our Culture at');
        $this->smarty->assign('name', 'Nexus');

        try {
            $this->smarty->display('about.tpl');
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }
}


