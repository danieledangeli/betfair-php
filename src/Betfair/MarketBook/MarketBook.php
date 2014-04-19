<?php

namespace Betfair\MarketBook;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;

class MarketBook extends AbstractBetfair
{
    /**
     * @param BetfairClientInterface $betfairClient
     * @param AdapterInterface $adapter
     */
    public function __construct(BetfairClientInterface $betfairClient, AdapterInterface $adapter, BetfairContainer $container)
    {
        parent::__construct($betfairClient, $adapter, $container);
    }

}
