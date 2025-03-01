<?php
/**
 * Purpose: Allows you to create tree structures of objects and work with them in the same way as with individual objects.
 * Characteristics: Used to build hierarchies of objects, where objects can be parts of other objects.
 **/

interface Component
{
    public function operation();
}

class Leaf implements Component
{
    public function operation(): string
    {
        return "Leaf";
    }
}

class Composite implements Component
{
    private $components = [];

    public function add(Component $component)
    {
        $this->components[] = $component;
    }

    public function operation(): string
    {
        $result = "Composite: ";
        foreach ($this->components as $component) {
            $result .= $component->operation() . ", ";
        }
        return rtrim($result, ', ');
    }
}

$leaf1 = new Leaf();
$leaf2 = new Leaf();
$composite = new Composite();

$composite->add($leaf1);
$composite->add($leaf2);

echo $composite->operation();
