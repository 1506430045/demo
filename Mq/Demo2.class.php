<?php
namespace Mq;

class Demo2
{
    function newTask()
    {
        $exchangeName = 'demo';
        $queueName = 'task_queue';
        $routeKey = 'task_queue';
        $message = empty($argv[1]) ? 'Hello World!' : ' ' . $argv[1];

        $connection = new \AMQPConnection(array('host' => '127.0.0.1', 'port' => '5672', 'vhost' => '/', 'login' => 'guest', 'password' => 'guest'));
        $connection->connect() or die("Cannot connect to the broker!\n");
        $channel = new \AMQPChannel($connection);
        $exchange = new \AMQPExchange($channel);
        $exchange->setName($exchangeName);
        $queue = new \AMQPQueue($channel);
        $queue->setName($queueName);
        $queue->setFlags(AMQP_DURABLE);
        $queue->declareQueue();
        $exchange->publish($message, $routeKey);
        var_dump("[x] Sent $message");
        $connection->disconnect();
    }

    function worker()
    {
        $exchangeName = 'demo';
        $queueName = 'task_queue';
        $routeKey = 'task_queue';

        $connection = new \AMQPConnection(array('host' => '127.0.0.1', 'port' => '5672', 'vhost' => '/', 'login' => 'guest', 'password' => 'guest'));
        $connection->connect() or die("Cannot connect to the broker!\n");
        $channel = new \AMQPChannel($connection);
        $exchange = new \AMQPExchange($channel);
        $exchange->setName($exchangeName);
        $exchange->setType(AMQP_EX_TYPE_DIRECT);
        $exchange->declareExchange();
        $queue = new \AMQPQueue($channel);
        $queue->setName($queueName);
        $queue->setFlags(AMQP_DURABLE);
        $queue->declareQueue();
        $queue->bind($exchangeName, $routeKey);
        var_dump('[*] Waiting for messages. To exit press CTRL+C');
        while (TRUE) {
            $queue->consume([$this, 'callback']);
            $channel->qos(0, 1);
        }
        $connection->disconnect();
    }

    function callback(\AMQPEnvelope $envelope, \AMQPQueue $queue)
    {
        $msg = $envelope->getBody();
        var_dump(" [x] Received:" . $msg);
        sleep(substr_count($msg, '.'));
        $queue->ack($envelope->getDeliveryTag());
    }
}