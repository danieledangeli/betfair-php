<?php

namespace Betfair\Factory;

use Betfair\Model\MarketFilter;

class MarketFilterFactory
{
    public function create()
    {
        return new MarketFilter();
    }
}
