<?php

namespace Danny50610\Cid;

class CID extends Multihash
{
    /** @var int */
    protected $version;

    protected $codec;

    public function __construct(int $version, $codec, MultihashType $type, string $binaryHash)
    {
        parent::__construct($type, $binaryHash);
        $this->version = $version;
        $this->codec = $codec;
    }

    public function __toString(): string
    {
        if ($this->version == 1) {
            return parent::__toString();
        } elseif ($this->version == 2) {
            // TODO:
        }

        throw new \Exception('unknown version');
    }
}