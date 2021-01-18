<?php


namespace App\Service;


class Container
{
    private array $classes = [];

    public function set($id, object $class): void
    {
        $this->classes[$id] = $class;
    }

    public function get($id)
    {
        if (!isset($this->classes[$id])){
            throw new \Exception('Class ID invalid');
        }

        return $this->classes[$id];
    }
}