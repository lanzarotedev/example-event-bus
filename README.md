# Example of Event Bus, CLI, version 1.0.0

This is basic example of EventBus implementation for command line. 

Senders and Subscribers can be subscribed to EventBus (Singleton). 
However, in this version, where we can have multiple Senders and Subscribers, there is no storage for 
Sender vs Subscriber mapping. In version 1.0.0 we are limited to 
single line command - one Sender, one message and one Subscriber at a time. 
The persistent mapping for Sender vs Subscriber will be added in next version. 
Also, reading / writing events log file functionality for Subscriber can be moved outside the class. Such modification  
will be used also for reading / writing mapping of Sender vs Subscriber.

In the EventBus example "event" can be a proxy for "message", because it may, or may not be the same thing, 
it depends on context.

Except that, an event as such can be expanded to a separate class/object, with "message" method and some additional 
properties (for instance: time). For basic version 1.0.0, to keep things simple, event is just a string. 

