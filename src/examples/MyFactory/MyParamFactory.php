<?php
namespace examples\MyFactory;

use Betfair\Model\ParamMarketBook;
use \examples\Model\CustomParamObject;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Model\MarketFilterInterface;

class MyParamFactory  implements ParamFactoryInterface
{
    /**
     * @param \Betfair\Model\MarketFilterInterface $marketFilter
     * @return \Betfair\Model\ParamInterface|CustomParamObject
     */
    public function create(MarketFilterInterface $marketFilter)
    {
        return new CustomParamObject($marketFilter);
    }

    /**
     * @return ParamMarketBook
     */
    public function createParamMarketBook()
    {
        return new ParamMarketBook();
    }
}