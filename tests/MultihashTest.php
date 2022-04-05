<?php

namespace Danny50610\Cid\Tests;

use Danny50610\Cid\Multihash;
use Danny50610\Cid\MultihashType;
use PHPUnit\Framework\TestCase;

class MultihashTest extends TestCase
{
    public function testPutUvarint()
    {
        $this->assertSame('12', bin2hex(Multihash::putUvarint(0x12)));
        $this->assertSame('e0e402', bin2hex(Multihash::putUvarint(0xb260)));
    }

    public function testToBytes()
    {
        $type = MultihashType::get('sha2_256');
        $this->assertSame('1203112233', bin2hex((new Multihash($type, "\x11\x22\x33"))->toBytes()));
        $this->assertSame('12051122330055', bin2hex((new Multihash($type, "\x11\x22\x33\x00\x55"))->toBytes()));
    }

    public function testToString()
    {
        $type = MultihashType::get('sha2_256');
        $this->assertSame(
            'QmbWqxBEKC3P8tqsKc98xmWNzrzDtRLMiMPL8wBuTGsMnR',
            (string)(new Multihash($type, hex2bin('C3C4733EC8AFFD06CF9E9FF50FFC6BCD2EC85A6170004BB709669C31DE94391A')))
        );
    }
}