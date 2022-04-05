<?php

namespace Danny50610\Cid;

use Tuupola\Base58;

class Multihash
{
    protected $type;

    protected $binaryHash;

    public function __construct(MultihashType $type, string $binaryHash)
    {
        $this->type = $type;
        $this->binaryHash = $binaryHash;
    }

    public function toBytes(): string
    {
        $result = '';
        $result .= self::putUvarint($this->type->getIndex());
        $result .= self::putUvarint(strlen($this->binaryHash));
        $result .= $this->binaryHash;
        return $result;
    }

    public function __toString()
    {
        $base58 = new Base58(['characters' => Base58::BITCOIN]);

        return $base58->encode($this->toBytes());
    }

    public static function putUvarint(int $x)
    {
        $result = '';
        while ($x >= 0x80) {
            $result .= pack('C', $x | 0x80);
            $x >>= 7;
        }
        $result .= pack('C', $x);

        return $result;
    }
}