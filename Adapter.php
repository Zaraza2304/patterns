<?php
/**
 * Purpose: Allows objects with incompatible interfaces to work together.
 * Characteristics: Used when compatibility is required between classes that cannot work directly with each other.
 **/

interface Target
{
    public function request();
}

class Adaptee
{
    public function specificRequest(): string
    {
        return "Specific Request";
    }
}

class Adapter implements Target
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request(): string
    {
        return $this->adaptee->specificRequest();
    }
}

$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);

echo $adapter->request();
