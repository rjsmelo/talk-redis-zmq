<?php
//redis_sorted_sets.php
require_once __DIR__ . '/../vendor/autoload.php';
$redis = new Predis\Client('tcp://localhost:6379');

$redis->del('SampleSortedSet');

// Using SADD
$redis->zadd('SampleSortedSet', 1, 'Hello'); // Hello(1)
$redis->zadd('SampleSortedSet', 2, 'World'); // Hello(1), World(2)
$redis->zadd('SampleSortedSet', 3, 'World'); // Hello(1), World(3)

// Using ZRANGE
var_dump($redis->zrange('SampleSortedSet', 0, -1, array('withscores'=>true))); // Hello(1), World(3)

// Using ZSCORE
echo $redis->zscore('SampleSortedSet', 'World') . "\n";  // 3

// Other commands: zrank, zrevrange, zrangebyscore, zremrangebyscore
// http://redis.io/commands#sorted_set