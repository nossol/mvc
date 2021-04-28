<?php declare(strict_types=1);


namespace App\Service;

class View implements ViewInterface
{
    private \Smarty $smarty;
    private string $template = '';
    private array $params = [];

    /**
     * View constructor.
     */
    public function __construct()
    {
        $this->smarty = new \Smarty();
        $this->smarty->setTemplateDir('/home/developer/mvc1/src/View/templates');
        $this->smarty->setCompileDir('/home/developer/mvc1/src/smarty/templates_c');
        $this->smarty->setCacheDir('/home/developer/mvc1/src/smarty/cache');
        $this->smarty->setConfigDir('/home/developer/mvc1/src/smarty/configs');
    }

    /**
     * @param string $template
     */
    public function addTemplate(string $template): void
    {
        $this->template = $template;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $name
     * @param $value
     */
    public function addTlpParam(string $name, $value): void
    {
        $this->params[$name] = $value;
    }

    /**
     *
     */
    public function display(): void
    {
        try {
            $this->smarty->assign($this->params);
            $this->smarty->display($this->template);
        } catch (\SmartyException | \Exception $e) {
            $this->template = '404.tpl';
            $this->smarty->assign('headline', 'ERROR 404');
            $this->smarty->assign('info', 'Page not found');
            $this->smarty->display($this->template);
        }
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

}