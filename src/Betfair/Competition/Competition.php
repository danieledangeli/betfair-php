<?php

namespace Betfair\Competition;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;

/**
 * Class Competition
 * @package Betfair\Competition
 */
class Competition extends AbstractBetfair
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
