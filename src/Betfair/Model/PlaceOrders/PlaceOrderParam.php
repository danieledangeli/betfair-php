<?php

namespace Betfair\Model\PlaceOrders;

use Betfair\Model\BetfairSerializable;

class PlaceOrderParam extends BetfairSerializable
{
    public function __construct($marketId, array $placeInstructions = array())
    {
        $this->marketId = $marketId;
        $this->placeInstructions = $placeInstructions;
    }

    /** @var  string */
    private $marketId;

    private $placeInstructions;

    /** @var  string */
    private $customRef;

    public function addPlaceInstruction(PlaceInstruction $placeInstruction)
    {
        $this->placeInstructions[] = $placeInstruction;
    }

    public function setCustomRef($customRef)
    {
        $this->customRef = $customRef;
    }
}
