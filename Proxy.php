<?php

/**
 * Purpose: Provides a proxy object for controlling access to another object.
 * Characteristics: Used for access control, lazy initialization, or caching.
 **/

interface Subject
{
    public function request();
}

class RealSubject implements Subject
{
    public function request(): string
    {
        return "Real Subject request";
    }
}

class Proxy implements Subject
{
    private $realSubject;

    public function __construct(RealSubject $realSubject)
    {
        $this->realSubject = $realSubject;
    }

    public function request(): string
    {
        return "Proxy: " . $this->realSubject->request();
    }
}

$realSubject = new RealSubject();
$proxy = new Proxy($realSubject);

echo $proxy->request();
