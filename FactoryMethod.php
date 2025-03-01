<?php

/**
 * Purpose: Defines an interface for creating objects, but allows subclasses to choose the class of object to create.
 * Characteristics: Used to provide flexibility in object creation, where product classes can change,
 * while client code remains stable.
 **/

interface Product
{
    public function getDescription();
}

class ConcreteProductA implements Product
{
    public function getDescription(): string
    {
        return "Product A";
    }
}

class ConcreteProductB implements Product
{
    public function getDescription(): string
    {
        return "Product B";
    }
}

interface Creator
{
    public function factoryMethod(): Product;
}

class ConcreteCreatorA implements Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProductA();
    }
}

class ConcreteCreatorB implements Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProductB();
    }
}

$creatorA = new ConcreteCreatorA();
$productA = $creatorA->factoryMethod();

$creatorB = new ConcreteCreatorB();
$productB = $creatorB->factoryMethod();
