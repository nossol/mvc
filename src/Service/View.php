<?php


namespace App\Service;

class View implements ViewInterface
{
    private \Smarty  $smarty;
    private string $template = '';

    public function __construct()
    {
        $this->smarty = new \Smarty();
        $this->smarty->setTemplateDir('/mnt/c/mvc/src/View/templates');
        $this->smarty->setCompileDir('/mnt/c/mvc/src/smarty/templates_c');
        $this->smarty->setCacheDir('/mnt/c/mvc/src/smarty/cache');
        $this->smarty->setConfigDir('/mnt/c/mvc/src/smarty/configs');
    }

    public function addTemplate(string $template):void
    {
        $this->template = $template;
    }

    public function addTlpParam(string $name, $value): void
    {
        $this->smarty->assign($name, $value);
    }

    public function display(): void
    {
        try {
            $this->smarty->display($this->template);
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }
}