<?php

namespace Betfair\TimeRange;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;

class TimeRange extends AbstractBetfair
{
    /**
     * @param BetfairClientInterface $betfairClient
     * @param AdapterInterface $adapter
     * @param BetfairContainer $container
     */
    public function __construct(BetfairClientInterface $betfairClient, AdapterInterface $adapter, BetfairContainer $container)
    {
        parent::__construct($betfairClient, $adapter, $container);
    }
}
