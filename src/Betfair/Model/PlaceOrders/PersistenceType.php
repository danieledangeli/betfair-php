<?php

namespace Betfair\Model\PlaceOrders;

use Betfair\Model\ArrayableInterface;

abstract class PersistenceType implements ArrayableInterface
{
    /**
     * Lapse the order when the market is turned in-play
     */
    const LAPSE = "LAPSE";

    /**
     * Persist the order to in-play. The bet will be place automatically into the in-play market at the start of the event
     */
    const PERSIST = "PERSIST";
    /**
     * Put the order into the auction (SP) at turn-in-play
     */
    const MARKET_ON_CLOSE = "MARKET_ON_CLOSE";

    public static function toArray()
    {
        return array(self::LAPSE, self::PERSIST, self::MARKET_ON_CLOSE);
    }
}
