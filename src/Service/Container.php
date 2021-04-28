<?php declare(strict_types=1);


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
            throw new \Exception('Class with ID "' . $id . '" not found. Did you forgot the "$container->set()" statement.');
        }
        return $this->classes[$id];
    }
}