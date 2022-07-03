<?php
namespace EventBus;

require_once 'EventBus/EventBus.php';
require_once 'EventBus/Sender.php';
require_once 'EventBus/Subscriber.php';

// Subscribes sender and subscriber, example:
// php eventbustest.php subscribe sender1 "Order has been completed" subscriber1
if($argv[1] == 'subscribe') {

    //'Order has been completed!'
    //subscribe
    $sender = new Sender($argv[2], $argv[3]);
    $subscriber = new Subscriber($argv[4]);

    $processEvent = EventBus::getInstance();
    $processEvent::subscribe($sender, $subscriber);
    $processEvent::publish($sender);
}