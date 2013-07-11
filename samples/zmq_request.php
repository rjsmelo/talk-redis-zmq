<?php
// zmq_request.php
$context = new ZMQContext();

$requester = new ZMQSocket($context, ZMQ::SOCKET_REQ);
$requester->connect("tcp://localhost:5555");

for ($number = 0 ; $number <= 10 ; $number++) {
    $mensage = "Hello " . $number . "!";
    echo "Sending - " . $mensage . "\n";
    $requester->send($mensage);
    $reply = $requester->recv();
    echo "Received - " . $reply . "\n";
}
