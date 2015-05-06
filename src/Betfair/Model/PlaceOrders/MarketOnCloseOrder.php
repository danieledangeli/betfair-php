<?php

namespace Betfair\Model\PlaceOrders;

/**
 * Class MarketOnCloseOrder
 *
 * Place a new MARKET_ON_CLOSE bet
 * @package Betfair\Model\PlaceOrders
 */
class MarketOnCloseOrder
{
    public function __construct($liability)
    {
        $this->liability = $liability;
    }

    /** @var  float */
    private $liability;
} 