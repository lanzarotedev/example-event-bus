<?php
namespace EventBus;

/**
 * Event Bus example
 * Copyright (c) 2022 Vlad Madejczyk
 */

class Subscriber
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function handleMessage($message)
    {
        $this->logMessage($message);
        echo 'Subscriber: ' . $this->name . ' got message: ' . $message . "\n";
    }

    private function logMessage($message)
    {
        //log it in file
    }
}