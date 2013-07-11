<?php
//redis_hashes.php
require_once __DIR__ . '/../vendor/autoload.php';
$redis = new Predis\Client('tcp://localhost:6379');

$redis->del('SampleHash');

// Using HMSET
$redis->hmset("SampleHash", array(
    'prop_a' => 'aaa',
    'prop_b' => 'bbb',
));

// Using HGETALL
var_dump($redis->hgetall("SampleHash")); // prop_a=>aaa, prop_b=>bbb

// Using HSET
$redis->hset('SampleHash', 'prop_b', 'ccc');

//USING HGET
echo $redis->hget("SampleHash", 'prop_b') ."\n"; // ccc

// Other commands: hexists, hdel, hlen, hkeys, hvals
// http://redis.io/commands/#hash