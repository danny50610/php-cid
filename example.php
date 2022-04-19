<?php

require 'vendor/autoload.php';

use Danny50610\Cid\CID;
use Danny50610\Cid\Codec;
use Danny50610\Cid\Multihash;
use Danny50610\Cid\MultihashType;

// true for binary
$hash = hash('sha256', 'The quick brown fox jumped over the lazy dog.', true);

$type = MultihashType::get('sha2_256');

// v0
$multihash = new Multihash($type, $hash);

$cidv0 = CID::makeV0($multihash);
print($cidv0 . PHP_EOL); // QmVPKnh2nScP7zfMWFEC6JAcruqxPncbMmAMa98AiMZCZQ

// v1
$cidv1 = new CID(1, Codec::get('DagProtobuf'), $type, $hash);
print($cidv1 . PHP_EOL); // zdj7WcUaA86dv5yzhyHEzBoxg1BV83Q7L2jE5ZtEwWqXo86jL
