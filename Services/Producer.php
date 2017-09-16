<?php
namespace AppBundle\Services;

/**
 * Produce messages to RabbitMQ queues.
 * This class is initialize by service.
 */
class Producer
{
    private $producer;

    public function __construct($producer)
    {

        $this->producer = $producer;
    }

    public function publish($message)
    {
        # Rabbit MQ want the message to be serialized
//        $this->producer->publish(serialize($message));
        # but I have a serialized message
        $this->producer->publish(($message));
    }
}