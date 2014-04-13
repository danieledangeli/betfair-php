<?php

namespace Betfair;


use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\Model\Param;
use Betfair\Model\ParamInterface;

class BetfairGeneric extends AbstractBetfair
{
    public function __construct(CredentialInterface $credential, BetfairJsonRpcClientInterface $jsonRpcClient, AdapterInterface $adapter)
    {
        parent::__construct($credential, $jsonRpcClient, $adapter);
    }

    public function executeCustomQuery(ParamInterface $param, $method)
    {
        return parent::executeCustomQuery($param, $method);
    }

} 