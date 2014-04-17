<?php

namespace Betfair\MarketBook;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;

class MarketBook extends AbstractBetfair
{
    /**
     * @param BetfairClientInterface $betfairClient
     * @param AdapterInterface $adapter
     */
    public function __construct(BetfairClientInterface $betfairClient, AdapterInterface $adapter)
    {
        parent::__construct($betfairClient, $adapter);
    }

}
