<?php
namespace EventBus;

/**
 * CLI file with basic EventBus functionality
 * subscribes Sender and Subscriber, for example:
 * php eventbustest.php subscribe sender1 "Order has been completed" subscriber1
 * The above line sets sender name and its message, and the last word is subscriber name.
 *
 * Copyright (c) 2022 Vlad Madejczyk
 */

require_once 'EventBus/EventBus.php';
require_once 'EventBus/Sender.php';
require_once 'EventBus/Subscriber.php';

// Basic validation of command line input.
if($argv[1] == 'subscribe' && count($argv) == 5) {

    $sender = new Sender($argv[2], $argv[3]);
    $subscriber = new Subscriber($argv[4]);

    $processEvent = EventBus::getInstance();
    $processEvent::subscribe($sender, $subscriber);
    $processEvent::publish($sender);

    $subscriber->readEventsLog();
} else {
    echo 'Correct usage example: ' . "\n"
        . 'php eventbustest.php subscribe sender1 "Order has been completed" subscriber1';
}