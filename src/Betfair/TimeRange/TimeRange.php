<?php

namespace Betfair\TimeRange;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;

class TimeRange extends AbstractBetfair
{
    public function __construct(CredentialInterface $credential, BetfairJsonRpcClientInterface $client, AdapterInterface $adapter)
    {
        parent::__construct($credential, $client, $adapter);
    }
}
