<?php

namespace Betfair\Model\PlaceOrders;


use Betfair\Model\ArrayableInterface;

abstract class OrderType implements ArrayableInterface
{
    const LIMIT = "LIMIT";

    const LIMIT_ON_CLOSE = "LIMIT_ON_CLOSE";

    const MARKET_ON_CLOSE = "MARKET_ON_CLOSE";

    public static function toArray()
    {
        return array(self::LIMIT, self::LIMIT_ON_CLOSE, self::MARKET_ON_CLOSE);
    }
} 