<?php

class Animal
{
    public string $name;
    public string $type;
    public string $owner;

    public function __construct($name, $type, $owner)
    {
        $this->name = $name;
        $this->type = $type;
        $this->owner = $owner;
    }

    public function returnAnimal(): string
    {
        return $this->name .' : '. $this->type .' : '. $this->owner;
    }
}