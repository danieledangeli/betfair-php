<?php

namespace Betfair\Model;

abstract class Side implements ArrayableInterface
{
    const LAY = "LAY";
    const BACK = "BACK";

    public static function toArray()
    {
        return array(
            self::LAY,
            self::BACK
        );
    }
}
