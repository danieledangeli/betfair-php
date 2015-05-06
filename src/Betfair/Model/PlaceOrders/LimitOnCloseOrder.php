<?php

namespace Betfair\Model\PlaceOrders;

/**
 * Class LimitOnCloseOrder
 *
 * Place a new LIMIT_ON_CLOSE bet
 * @package Betfair\Model\PlaceOrders
 */
class LimitOnCloseOrder
{
    public function __construct($liability, $price)
    {
        $this->liability = $liability;
        $this->price = $price;
    }

    /** @var  float */
    private $liability;

    /** @var  float */
    private $price;

    /**
     * @return float
     */
    public function getLiability()
    {
        return $this->liability;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
} 