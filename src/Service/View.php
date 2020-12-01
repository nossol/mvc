<?php


namespace App\Service;


interface View
{
    public function addTemplate(string $template): void;

    public function addTlpParam(string $name, $value): void;

    public function display(): void;
}