<?php

namespace Danny50610\Cid;

class CID extends Multihash
{
    /** @var int */
    protected $version;
    /** @var Codec */
    protected $codec;

    public function __construct(int $version, Codec $codec, MultihashType $type, string $binaryHash)
    {
        parent::__construct($type, $binaryHash);
        $this->version = $version;
        $this->codec = $codec;
    }

    public static function makeV0(Multihash $multihash)
    {
        return new static(0, Codec::get('DagProtobuf'), $multihash->type, $multihash->binaryHash);
    }

    public function __toString(): string
    {
        if ($this->version == 0) {
            return parent::__toString();
        } elseif ($this->version == 1) {
            return Multibase::encode(MultibaseType::get('Base58BTC'), $this->toBytesV1());
        }

        throw new \Exception('unknown version');
    }

    public function toBytesV1(): string
    {
        $result = '';
        $result .= self::putUvarint($this->version);
        $result .= self::putUvarint($this->codec->getIndex());
        $result .= parent::toBytes();

        return $result;
    }
}