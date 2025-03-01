<?php
/**
 * Purpose: Defines a family of algorithms, encapsulates them, and makes them interchangeable.
 * Features: Allows algorithms to be changed independently of client code.
 *
 */

interface Strategy
{
    public function execute();
}

class ConcreteStrategyA implements Strategy
{
    public function execute(): string
    {
        return "Concrete Strategy A";
    }
}

class ConcreteStrategyB implements Strategy
{
    public function execute(): string
    {
        return "Concrete Strategy B";
    }
}

class Context
{
    private $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy()
    {
        return $this->strategy->execute();
    }
}

$strategyA = new ConcreteStrategyA();
$strategyB = new ConcreteStrategyB();

$context = new Context($strategyA);
echo $context->executeStrategy();

$context->setStrategy($strategyB);
echo $context->executeStrategy();
