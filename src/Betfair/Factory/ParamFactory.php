<?php

namespace Betfair\Factory;

use Betfair\Model\MarketFilterInterface;
use Betfair\Model\Param;

class ParamFactory
{

    public function create(MarketFilterInterface $marketFilter)
    {
       return new Param($marketFilter);
    }
}
