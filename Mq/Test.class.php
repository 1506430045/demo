<?php
namespace Mq;

class Test
{
    public function send()
    {
        $exchangeName = 'demo';     //交换器
        $queueName = 'hello';       //队列
        $routeKey = 'hello';        //路由    队列的名称
        $message = 'Hello World!';  //消息

        $conn_args = array(
            'host' => '127.0.0.1',
            'port' => '5672',
            'vhost' => '/',
            'login' => 'guest',
            'password' => 'guest'
        );
        $connection = new \AMQPConnection($conn_args);
        $connection->connect() or die("Cannot connect to the broker!\n");
        try {
            $channel = new \AMQPChannel($connection);
            $exchange = new \AMQPExchange($channel);
            $exchange->setName($exchangeName);
            $queue = new \AMQPQueue($channel);
            $queue->setName($queueName);
            $exchange->publish($message, $routeKey);
            var_dump("[x] Sent {$message}");
        } catch (\AMQPConnectionException $e) {
            trigger_error($e->getMessage());
            exit();
        }
        $connection->disconnect();
    }

    public function receive()
    {
        $exchangeName = 'demo';
        $queueName = 'hello';
        $routeKey = 'hello';

        $conn_args = array(
            'host' => '127.0.0.1',
            'port' => '5672',
            'vhost' => '/',
            'login' => 'guest',
            'password' => 'guest'
        );
        $connection = new \AMQPConnection($conn_args);
        $connection->connect() or die("Cannot connect to the broker!\n");
        $channel = new \AMQPChannel($connection);
        $exchange = new \AMQPExchange($channel);
        $exchange->setName($exchangeName);
        $exchange->setType(AMQP_EX_TYPE_DIRECT);
        $exchange->declareExchange();
        $queue = new \AMQPQueue($channel);
        $queue->setName($queueName);
        $queue->declareQueue();
        $queue->bind($exchangeName, $routeKey);

        var_dump('[*] Waiting for messages. To exit press CTRL+C');
        while (TRUE) {
            $queue->consume([$this, 'callback']);
        }
        $connection->disconnect();
    }

    function callback(\AMQPEnvelope $envelope, \AMQPQueue $queue)
    {
        $msg = $envelope->getBody();
        var_dump(" [x] Received:" . $msg);
        $queue->nack($envelope->getDeliveryTag());
    }
}