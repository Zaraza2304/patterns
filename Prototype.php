<?php
/**
 * Purpose: Allows the creation of new objects by cloning existing ones, providing flexibility and reducing the overhead of object creation.
 * Characteristics: Useful when you want to create objects with similar structure but different values.
 **/

interface Prototype
{
    public function __clone();
}

class ConcretePrototype implements Prototype
{
    private $field;

    public function __construct($field)
    {
        $this->field = $field;
    }

    public function __clone()
    {

    }

    public function getField()
    {
        return $this->field;
    }
}

$prototype = new ConcretePrototype("Initial Field");
$clone = clone $prototype;
echo $clone->getField();
