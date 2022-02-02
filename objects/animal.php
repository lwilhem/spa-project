<?php

class Animal
{
    public string $name;
    public string $type;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function returnAnimal(): string
    {
        return $this->name .' : '. $this->type;
    }
}