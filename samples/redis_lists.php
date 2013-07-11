<?php
//redis_lists.php
require_once __DIR__ . '/../vendor/autoload.php';
$redis = new Predis\Client('tcp://localhost:6379');

$redis->del('SampleList');

// Using {L,R}PUSH
$redis->lpush('SampleList', 'a'); // a
$redis->lpush('SampleList', 'b'); // b, a
$redis->rpush('SampleList', 'c'); // b, a, c

// Using LLEN
echo $redis->llen('SampleList') . "\n"; // 3

// Using LINDEX (note: zero indexed)
echo $redis->lindex('SampleList', 1) . "\n"; // a

// Using {L,R}POP

echo $redis->lpop('SampleList') . "\n"; // b
echo $redis->rpop('SampleList') . "\n"; // c

// Other commands: lrange, rpoplpush
// http://redis.io/commands#list