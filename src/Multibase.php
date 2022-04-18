<?php

namespace Danny50610\Cid;

use Tuupola\Base58;

class Multibase
{
    public static function encode(MultibaseType $type, string $binaryData): string
    {
        $prefix = $type->getPrefix();
        switch ($prefix) {
            case MultibaseType::typeMap['Base58BTC']:
                $base58 = new Base58(['characters' => Base58::BITCOIN]);

                return $prefix . $base58->encode($binaryData);
        }

        throw new \Exception('Unknown Multibase Type');
    }
}