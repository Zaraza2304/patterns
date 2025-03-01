<?php

/**
 * Purpose: Defines a one-to-many dependency between objects so that when the state of one object changes, all objects dependent on it are automatically notified and updated.
 * Characteristics: Allows you to implement a relationship between objects without tight dependencies between them.
 **/

interface Observer
{
    public function update($data);
}

class ConcreteObserverA implements Observer
{
    public function update($data): string
    {
        return "Concrete Observer A: " . $data;
    }
}

class ConcreteObserverB implements Observer
{
    public function update($data): string
    {
        return "Concrete Observer B: " . $data;
    }
}

class Subject
{
    private $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function notify($data): array
    {
        $result = [];
        foreach ($this->observers as $observer) {
            $result[] = $observer->update($data);
        }
        return $result;
    }
}

$subject = new Subject();
$observerA = new ConcreteObserverA();
$observerB = new ConcreteObserverB();

$subject->attach($observerA);
$subject->attach($observerB);

$data = "Data has changed";
$notifications = $subject->notify($data);
print_r($notifications);
