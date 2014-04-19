<?php

namespace Betfair\Country;
use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;

class Country extends AbstractBetfair
{
    public function __construct(BetfairClientInterface $client, AdapterInterface $adapter, BetfairContainer $container)
    {
        parent::__construct($client, $adapter, $container);
    }
}
