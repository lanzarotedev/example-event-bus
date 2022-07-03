<?php
namespace EventBus;

/**
 * Subscriber class - basic functionality.
 * Copyright (c) 2022 Vlad Madejczyk
 */

class Subscriber
{
    private $name;
    private $logLocation;

    public function __construct($name)
    {
        $this->name = $name;
        $this->logLocation = dirname(__DIR__,1) . '/Logs/events.log';
    }

    /**
     * Get Subscriber name.
     * @param string $event
     * @return void
     */
    public function handleEvent(string $event)
    {
        $this->logEvent($event);
        echo 'Subscriber: ' . $this->name . ' got event: ' . $event . "\n";
    }

    /**
     * Saves event in a log file.
     * @param string $event
     * @return void
     */
    private function logEvent(string $event)
    {
        $newEventInfo = $event . ' - event time: ' . time();

        if (!file_exists($this->logLocation)) {
            $eventsLog[] = $newEventInfo;
        } else {
            $eventsLog = unserialize(file_get_contents($this->logLocation));
            $eventsLog[] = $newEventInfo;
        }

        file_put_contents($this->logLocation, serialize($eventsLog));
    }

    /**
     * Reads events log file.
     * @return void
     */
    public function readEventsLog()
    {
        if (file_exists($this->logLocation)) {
            print_r(unserialize(file_get_contents($this->logLocation)));
        } else {
            echo 'No data in Events Log' . "\n";
        }
    }
}