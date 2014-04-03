<?php

namespace Betfair\Event;


use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Credentials;
use Betfair\Helper\FilterHelper;
use Betfair\JsonRPCClient;

class MarketBook extends AbstractBetfair
{
    /**
     * The API METHOD NAME
     */
    const METHOD = "listMarketBook";

    /**
     * @param Credentials $credential
     * @param JsonRPCClient $jsonRpcClient
     * @param AdapterInterface $adapter
     */
    public function __construct(Credentials $credential, JsonRPCClient $jsonRpcClient, AdapterInterface $adapter)
    {
        parent::__construct($credential, $jsonRpcClient, $adapter);

    }

    public function listMarketBook()
    {

    }


} 