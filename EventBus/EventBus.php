<?php
namespace EventBus;

/**
 * Event Bus example
 * Copyright (c) 2022 Vlad Madejczyk
 */

class EventBus
{
    protected $listeners = array();

    private function __construct()
    {
    }

    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    public static function subscribe(Sender $sender,Subscriber $subscriber)
    {
        $instance = EventBus::getInstance();
        $id = md5(serialize($sender));

        $instance->listeners[$id][] = $subscriber;
    }

    public static function publish(Sender $sender)
    {
        $instance = EventBus::getInstance();
        $id = md5(serialize($sender));

        $subscribers = $instance->listeners[$id];

        foreach ($subscribers as $subscriber) {
            $subscriber->handleMessage($sender->getEventMessage());
        }
    }
}