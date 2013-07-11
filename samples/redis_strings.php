<?php
//redis_strings.php
require_once __DIR__ . '/../vendor/autoload.php';
$redis = new Predis\Client('tcp://localhost:6379');

// Using SET
$redis->set("SampleKey", "Throw me any thing here....");
echo $redis->get("SampleKey") . "\n"; // Throw me any thing here....

// Remove Key
$redis->del("SampleKey");

// Using APPEND
$redis->append("SampleKey", "Hello"); // Hello
$redis->append("SampleKey", " World!"); // Hello World!
echo $redis->get("SampleKey") . "\n";

// Other commands: incr, decr, incrby, getrange, setrange
// http://redis.io/commands/#string