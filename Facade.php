<?php
/**
 * Purpose: Provides a unified interface for a group of subsystem interfaces, simplifying interaction with it.
 * Characteristics: Hides the complexity of interacting with a complex system behind a simple interface.
 **/


class SubsystemA
{
    public function operationA(): string
    {
        return "Subsystem A operation";
    }
}

class SubsystemB
{
    public function operationB(): string
    {
        return "Subsystem B operation";
    }
}

class Facade
{
    private $subsystemA;
    private $subsystemB;

    public function __construct()
    {
        $this->subsystemA = new SubsystemA();
        $this->subsystemB = new SubsystemB();
    }

    public function operation(): string
    {
        $result = "Facade initializes subsystems:\n";
        $result .= $this->subsystemA->operationA() . "\n";
        $result .= $this->subsystemB->operationB();
        return $result;
    }
}

$facade = new Facade();
echo $facade->operation();

