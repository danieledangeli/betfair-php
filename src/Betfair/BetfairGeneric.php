<?php

namespace Betfair;


use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\Model\Param;
use Betfair\Model\ParamInterface;

class BetfairGeneric extends AbstractBetfair
{
    public function __construct(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapter
    )
    {
        parent::__construct($betfairClient, $adapter);
    }

    public function executeCustomQuery(ParamInterface $param, $method)
    {
        return parent::executeCustomQuery($param, $method);
    }

} 