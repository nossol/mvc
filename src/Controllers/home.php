<?php

namespace App\Controllers;


class home implements Controller
{
    private \Smarty $smarty;
    private string $template;


    public function __construct()
    {
        $this->template = 'home.tpl';

        $this->smarty = new \Smarty();
        $this->smarty->setTemplateDir('/mnt/c/mvc/src/smarty/templates');
        $this->smarty->setCompileDir('/mnt/c/mvc/src/smarty/templates_c');
        $this->smarty->setCacheDir('/mnt/c/mvc/src/smarty/cache');
        $this->smarty->setConfigDir('/mnt/c/mvc/src/smarty/configs');

        $this->smarty->assign('name', 'General McNugget');
    }

    public function action(): void
    {
        try {
            $this->smarty->display($this->template);
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }
}


