<?php
/**
 * Purpose: Provides an interface for creating families of related or dependent objects without specifying their specific classes.
 * Features: Allows you to create groups of objects that need to interact with each other, such as different types of buttons and windows for different operating systems.
 **/


interface Button
{
    public function render();
}

class WindowsButton implements Button
{
    public function render()
    {
        return "Render Windows Button";
    }
}

class MacOSButton implements Button
{
    public function render()
    {
        return "Render macOS Button";
    }
}

interface GUIFactory
{
    public function createButton(): Button;
}

class WindowsFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new WindowsButton();
    }
}

class MacOSFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new MacOSButton();
    }
}

$osFactory = new WindowsFactory(); // or MacOSFactory
$button = $osFactory->createButton();
echo $button->render();
