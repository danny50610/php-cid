<?php

namespace Danny50610\Cid;

class MultibaseType
{
    public const typeMap = [
        'Base1'          => '1',
        'Base2'          => '0',
        'Base8'          => '7',
        'Base10'         => '9',
        'Base16'         => 'f',
        'Base32'         => 'b',
        'Base32Upper'    => 'B',
        'Base32Hex'      => 'v',
        'Base32HexUpper' => 'V',
        'Base36'         => 'k',
        'Base58Flickr'   => 'Z',
        'Base58BTC'      => 'z',
        'Base64'         => 'm',
        'Base64Pad'      => 'M',
    ];

    protected $prefix;

    public function __construct($prefix)
    {
        $this->prefix = $prefix;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public static function get(string $name): MultibaseType
    {
        $info = self::typeMap[$name];
        return new MultibaseType($info);
    }
}
