<?php


namespace Betfair\Model;


use Betfair\Factory\MarketFilterFactory;
use Betfair\Factory\ParamFactory;

class QueryManager
{
    protected $paramFactory;
    protected $marketFilterFactory;

    public function __construct(ParamFactory $paramFactory, MarketFilterFactory $marketFilterFactory)
    {
        $this->paramFactory = $paramFactory;
        $this->marketFilterFactory = $marketFilterFactory;
    }

    public function createMarketFilter()
    {
        return $this->marketFilterFactory->create();
    }

    public function createParam(MarketFilterInterface $marketFilter)
    {
        return $this->paramFactory->create($marketFilter);
    }

} 