<?php
// zmq_subscriber.php
$context = new ZMQContext();

$subscriber = $context->getSocket(ZMQ::SOCKET_SUB);
$subscriber->connect("tcp://localhost:5556");

$filter = $_SERVER['argc'] > 1 ? $_SERVER['argv'][1] : "UTC";
$subscriber->setSockOpt(ZMQ::SOCKOPT_SUBSCRIBE, $filter);

while (true) {
    $message = $subscriber->recv();
    echo substr($message,4) . "\n"; // remove prefix
}
