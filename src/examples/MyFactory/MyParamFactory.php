<?php

class MyParamFactory  implements \Betfair\Factory\ParamFactoryInterface
{
    /**
     * @param \Betfair\Model\MarketFilterInterface $marketFilter
     * @return \Betfair\Model\ParamInterface|void
     */
    public function create(\Betfair\Model\MarketFilterInterface $marketFilter)
    {
       return new CustomParamObject();
    }
}