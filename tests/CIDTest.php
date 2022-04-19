<?php

namespace Danny50610\Cid\Tests;

use Danny50610\Cid\CID;
use Danny50610\Cid\Codec;
use Danny50610\Cid\Multihash;
use Danny50610\Cid\MultihashType;
use PHPUnit\Framework\TestCase;

class CIDTest extends TestCase
{
    public function testToString()
    {
        $cid = new Cid(1, Codec::get('DagProtobuf'), MultihashType::get('sha2_256'), hex2bin('012A29AA21F4593528BB4C03A8556AC0729536C8307F4D5001C3DE39C750B3EF'));

        $this->assertSame(
            'zdj7WVWSmwjYU7h3JV8KByUdEb3i6VUHvUwKgo7k6xHLzYr6a',
            (string) $cid
        );
    }

    public function testMakeV0()
    {
        $type = MultihashType::get('sha2_256');
        $multihash = new Multihash($type, hex2bin('C3C4733EC8AFFD06CF9E9FF50FFC6BCD2EC85A6170004BB709669C31DE94391A'));

        $this->assertSame(
            'QmbWqxBEKC3P8tqsKc98xmWNzrzDtRLMiMPL8wBuTGsMnR',
            (string) (CID::makeV0($multihash))
        );
    }
}
