<?php


namespace App\Controllers;


abstract class PageController implements Controller
{
    protected \Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new \Smarty();
        $this->smarty->setTemplateDir('/mnt/c/mvc/src/smarty/templates');
        $this->smarty->setCompileDir('/mnt/c/mvc/src/smarty/templates_c');
        $this->smarty->setCacheDir('/mnt/c/mvc/src/smarty/cache');
        $this->smarty->setConfigDir('/mnt/c/mvc/src/smarty/configs');
    }
}