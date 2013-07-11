<?php
//zmq_reply.php
$context = new ZMQContext();

$responder = new ZMQSocket($context, ZMQ::SOCKET_REP);
$responder->bind("tcp://*:5555");

while (true) {
    $request = $responder->recv();
    echo $request . "\n";
    sleep (1); // some work
    $responder->send("Reply to: " . $request);
}