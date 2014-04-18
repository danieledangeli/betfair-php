<?php

namespace Betfair\Country;
use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;

class Country extends AbstractBetfair
{
    public function __construct(BetfairClientInterface $client, AdapterInterface $adapter)
    {
        parent::__construct($client, $adapter);
    }
}
