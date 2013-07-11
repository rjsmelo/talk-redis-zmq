<?php
//redis_sets.php
require_once __DIR__ . '/../vendor/autoload.php';
$redis = new Predis\Client('tcp://localhost:6379');

$redis->del('SampleSet');
$redis->del('OtherSampleSet');

// Using SADD
$redis->sadd('SampleSet', 'Hello'); // Hello
$redis->sadd('SampleSet', 'World'); // Hello, World
$redis->sadd('SampleSet', 'World'); // Hello, World

// Using SMEMBERS
var_dump($redis->smembers('SampleSet')); // Hello, World

// Using SINTER
$redis->sadd('OtherSampleSet', 'Hello');
$redis->sadd('OtherSampleSet', 'All');
var_dump($redis->sinter('SampleSet', 'OtherSampleSet')); // Hello

// Using SUNION
var_dump($redis->sunion('SampleSet', 'OtherSampleSet')); // Hello, World, All

// Other commands: smove, srandmember, srem, scard
// http://redis.io/commands#set