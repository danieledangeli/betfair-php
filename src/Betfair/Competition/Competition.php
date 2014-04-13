<?php

namespace Betfair\Competition;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;

/**
 * Class Competition
 * @package Betfair\Competition
 */
class Competition extends AbstractBetfair
{
    /**
     * @param CredentialInterface $credential
     * @param BetfairJsonRpcClientInterface $jsonRpcClient
     * @param AdapterInterface $adapter
     */
    public function __construct(CredentialInterface $credential, BetfairJsonRpcClientInterface $jsonRpcClient, AdapterInterface $adapter)
    {
        parent::__construct($credential, $jsonRpcClient, $adapter);
    }
}
