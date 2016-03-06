<?php

namespace Betfair\Model\PlaceOrders;

use Betfair\Model\Side;

class PlaceInstructionFactory
{
    public $placeInstruction;

    public function createPlaceInstruction($orderSide, $selectionId, Side $side)
    {
        $this->placeInstruction = new PlaceInstruction($orderSide, $selectionId, $side);
        return $this;
    }

    public function withHandicap($handicap)
    {

    }
}
