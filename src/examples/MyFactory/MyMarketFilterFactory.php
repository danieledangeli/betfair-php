<?php
namespace examples\MyFactory;

use  examples\Model\CustomMarketFilterObject;
use Betfair\Factory\MarketFilterFactoryInterface;

class MyMarketFilterFactory implements MarketFilterFactoryInterface
{

    /**
     * @return \Betfair\Model\MarketFilterInterface
     */
    public function create()
    {
        return new CustomMarketFilterObject();
    }
}