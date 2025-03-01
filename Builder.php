<?php
/**
 * Purpose: Separates the creation of a complex object from its representation, allowing the same construction process to create different representations.
 * Characteristics: Used when the object has a complex structure with many options for configuration.
 **/


class Product
{
    private $parts = [];

    public function addPart($part)
    {
        $this->parts[] = $part;
    }

    public function listParts(): string
    {
        return "Product parts: " . implode(', ', $this->parts);
    }
}

interface Builder
{
    public function buildPartA();

    public function buildPartB();

    public function getResult(): Product;
}

class ConcreteBuilder implements Builder
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function buildPartA()
    {
        $this->product->addPart("Part A");
    }

    public function buildPartB()
    {
        $this->product->addPart("Part B");
    }

    public function getResult(): Product
    {
        return $this->product;
    }
}

class Director
{
    public function build(Builder $builder)
    {
        $builder->buildPartA();
        $builder->buildPartB();
    }
}

$builder = new ConcreteBuilder();
$director = new Director();

$director->build($builder);
$product = $builder->getResult();
echo $product->listParts();
