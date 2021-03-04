<?php


namespace App\Service;


class Container
{
    private array $classes = [];

    /**
     * @param $id
     * @param object $class
     */
    public function set($id, object $class): void
    {
        $this->classes[$id] = $class;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function get($id)
    {
        if (!isset($this->classes[$id])){
            throw new \Exception('Class ID invalid');
        }

        return $this->classes[$id];
    }
}