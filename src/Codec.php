<?php

namespace Danny50610\Cid;

class Codec
{
    public const typeMap = [
        'Raw'           => 0x55,
        'DagProtobuf'   => 0x70,
        'DagCbor'       => 0x71,
        'Libp2pKey'     => 0x72,
        'EthereumBlock' => 0x90,
        'EthereumTx'    => 0x91,
        'BitcoinBlock'  => 0xb0,
        'BitcoinTx'     => 0xb1,
        'ZcashBlock'    => 0xc0,
        'ZcashTx'       => 0xc1,
    ];

    protected $index;

    public function __construct($index)
    {
        $this->index = $index;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public static function get(string $name): Codec
    {
        $info = self::typeMap[$name];
        return new Codec($info);
    }
}
