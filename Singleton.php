<?php
/**
 * Purpose: Ensures that a class has only one instance, and provides a global point of access to it.
 * Characteristics: Used when you want to ensure a single instance of a class, such as
 * for access to a shared resource or settings.
 **/

class Singleton
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): Singleton
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$singletonInstance = Singleton::getInstance();
