<?php

namespace Danny50610\Cid;

class MultihashType
{
    public const typeMap = [
        'id'           => [0, -1],
        'md5'          => [0xd5, 16],
        'sha1'         => [0x11, 20],
        'sha2_256'     => [0x12, 32],
        'sha2_512'     => [0x13, 64],
        'dbl_sha2_256' => [0x56, 32],
        'sha3_224'     => [0x17, 24],
        'sha3_256'     => [0x16, 32],
        'sha3_512'     => [0x14, 64],
        'shake_128'    => [0x18, 32],
        'shake_256'    => [0x19, 64],
        'keccak_224'   => [0x1a, 24],
        'keccak_256'   => [0x1b, 32],
        'keccak_384'   => [0x1c, 48],
        'keccak_512'   => [0x1d, 64],
        'murmur3'      => [0x22, 4],
    ];

    protected $index;

    protected $length;

    public function __construct($index, $length)
    {
        $this->index = $index;
        $this->length = $length;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public static function get(string $name): MultihashType
    {
        $info = self::typeMap[$name];
        return new MultihashType($info[0], $info[1]);
    }
}