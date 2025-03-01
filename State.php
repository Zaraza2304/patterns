<?php
/**
 * Purpose: Allows an object to change its behavior based on an internal state.
 * Characteristics: Used to control complex behavior that changes based on internal conditions.
 **/

interface State
{
    public function handle();
}

class ConcreteStateA implements State
{
    public function handle(): string
    {
        return "Concrete State A";
    }
}

class ConcreteStateB implements State
{
    public function handle(): string
    {
        return "Concrete State B";
    }
}

class Context
{
    private $state;

    public function setState(State $state)
    {
        $this->state = $state;
    }

    public function request()
    {
        return $this->state->handle();
    }
}

$context = new Context();

$stateA = new ConcreteStateA();
$context->setState($stateA);
echo $context->request();

$stateB = new ConcreteStateB();
$context->setState($stateB);
echo $context->request();

