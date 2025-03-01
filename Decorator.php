<?php

/**
 * Goal: Add new functional objects without changing their structure.
 * Characteristics: Useful when you want to switch or change the behavior of objects without changing the code of their base classes.
 **/

interface Component
{
    public function operation();
}

class ConcreteComponent implements Component
{
    public function operation(): string
    {
        return "Concrete Component";
    }
}

class Decorator implements Component
{
    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function operation(): string
    {
        return "Decorator: " . $this->component->operation();
    }
}

class ConcreteDecoratorA extends Decorator
{
    public function operation(): string
    {
        return parent::operation() . ", Added Behavior A";
    }
}

class ConcreteDecoratorB extends Decorator
{
    public function operation(): string
    {
        return parent::operation() . ", Added Behavior B";
    }
}

$component = new ConcreteComponent();
$decoratorA = new ConcreteDecoratorA($component);
$decoratorB = new ConcreteDecoratorB($decoratorA);

echo $decoratorB->operation();
