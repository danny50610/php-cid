<?php

namespace Danny50610\Cid;

class MultihashType
{
    public const typeMap = [
        'sha2_256' => [0x12, 32]
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