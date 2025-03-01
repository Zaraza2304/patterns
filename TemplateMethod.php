<?php

/**
 * Purpose: Defines the basic steps of an algorithm, leaving subclasses the ability to override some steps.
 * Features: Avoids duplicating code in different subclasses, providing a single algorithm.
 **/

abstract class AbstractClass
{
    final public function templateMethod(): string
    {
        return "Abstract Class: " . $this->primitiveOperation1() . " " . $this->primitiveOperation2();
    }

    abstract protected function primitiveOperation1();

    abstract protected function primitiveOperation2();
}

class ConcreteClass extends AbstractClass
{
    protected function primitiveOperation1(): string
    {
        return "Primitive Operation 1";
    }

    protected function primitiveOperation2(): string
    {
        return "Primitive Operation 2";
    }
}

$abstract = new ConcreteClass();
echo $abstract->templateMethod();
