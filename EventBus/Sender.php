<?php
namespace EventBus;

/**
 * Event Bus example
 * Copyright (c) 2022 Vlad Madejczyk
 */

class Sender
{
    private $name;
    private $eventMessage;

    public function __construct($name, $eventMessage) {

        $this->name = $name;
        $this->eventMessage = $eventMessage;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEventMessage()
    {
        return $this->eventMessage;
    }
}