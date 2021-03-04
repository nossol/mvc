<?php


namespace App\Service;


interface ViewInterface
{
    /**
     * @param string $template
     */
    public function addTemplate(string $template): void;

    /**
     * @param string $name
     * @param $value
     */
    public function addTlpParam(string $name, $value): void;

    /**
     *
     */
    public function display(): void;
}