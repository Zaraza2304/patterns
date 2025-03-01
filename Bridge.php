<?php
/**
 * Purpose: Separates abstraction and implementation, allowing them to be changed independently.
 * Characteristics: Useful when you want to avoid constantly increasing the number of classes in a hierarchy due to new combinations of functionality.
 **/

interface Implementor
{
    public function operationImpl();
}

class ConcreteImplementorA implements Implementor
{
    public function operationImpl(): string
    {
        return "Concrete Implementor A";
    }
}

class ConcreteImplementorB implements Implementor
{
    public function operationImpl(): string
    {
        return "Concrete Implementor B";
    }
}

abstract class Abstraction
{
    protected $implementor;

    public function __construct(Implementor $implementor)
    {
        $this->implementor = $implementor;
    }

    abstract public function operation();
}

class RefinedAbstraction extends Abstraction
{
    public function operation(): string
    {
        return "Refined Abstraction: " . $this->implementor->operationImpl();
    }
}

$implementorA = new ConcreteImplementorA();
$refinedAbstraction = new RefinedAbstraction($implementorA);

echo $refinedAbstraction->operation();
