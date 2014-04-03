<?php

namespace Betfair\MarketCatalogue;


use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Credentials;
use Betfair\JsonRPCClient;
use Betfair\Model\MarketFilter;
use Betfair\Model\Param;

class MarketCatalogue extends AbstractBetfair
{
    /**
     * The API METHOD NAME
     */
    const METHOD = "listMarketCatalogue";

    const DEFAULT_MAX_RESULT = "10";


    /**
     * @param Credentials $credential
     * @param JsonRPCClient $jsonRpcClient
     * @param AdapterInterface $adapter
     */
    public function __construct(Credentials $credential, JsonRPCClient $jsonRpcClient, AdapterInterface $adapter)
    {
        parent::__construct($credential, $jsonRpcClient, $adapter);
    }

    public function listMarketCatalogue()
    {
        $filter = new MarketFilter();
        $filter->setEventTypeIds(array(1));
        $param = $this->buildParam($filter);
        $param->setMaxResults(self::DEFAULT_MAX_RESULT);

        $response = $this->buildSportApiNgRequest(self::METHOD, json_encode($param));
        return $this->adapter->adaptResponse($response);
    }

    public function executeCustomQuery(Param $param)
    {
        return parent::executeCustomQuery($param, self::METHOD);
    }

} 