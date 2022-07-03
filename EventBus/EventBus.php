<?php
namespace EventBus;

/**
 * The EventBus class is a Singleton, with subscription
 * and publishing functionality
 *
 * Copyright (c) 2022 Vlad Madejczyk
 */

class EventBus
{
    private $listeners = array();

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

    /**
     * Subscribes Sender and Subscriber instances.
     *
     * @param Sender     $sender      The Sender instance
     * @param Subscriber $subscriber  The Subscriber instance
     *
     * @return void
     */
    public static function subscribe(Sender $sender,Subscriber $subscriber)
    {
        $instance = EventBus::getInstance();
        $id = md5(serialize($sender));

        $instance->listeners[$id][] = $subscriber;
    }

    /**
     * Publishes Sender message to Subscribers.
     *
     * @param Sender $sender The Sender instance
     *
     * @return void
     */
    public static function publish(Sender $sender)
    {
        $instance = EventBus::getInstance();
        $id = md5(serialize($sender));

        $subscribers = $instance->listeners[$id];

        foreach ($subscribers as $subscriber) {
            $subscriber->handleEvent($sender->getEvent());
        }
    }
}