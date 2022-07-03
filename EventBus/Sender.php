<?php
namespace EventBus;

/**
 * Sender class - basic functionality: name and event.
 * Copyright (c) 2022 Vlad Madejczyk
 */

class Sender
{
    private $name;
    private $event;

    public function __construct($name, $event) {

        $this->name = $name;
        $this->event = $event;
    }

    /**
     * Get Sender name.
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Get Sender event.
     * @return string
     */
    public function getEvent() : string
    {
        return $this->event;
    }
}