<?php
// zmq_publisher.php
$context = new ZMQContext();

$publisher = $context->getSocket(ZMQ::SOCKET_PUB);
$publisher->bind("tcp://*:5556");

$timezones = array('UTC', 'EST');
while (true) {
    foreach($timezones as $tz) {
        date_default_timezone_set($tz);
        $message = date('T:c'); // the message to broadcast
        $publisher->send($message);
    }
    sleep(1);
}