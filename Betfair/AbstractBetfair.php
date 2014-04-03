<?php

/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Helper\FilterHelper;
use Betfair\Model\MarketFilter;
use Betfair\Model\Param;

/**
 * Credentials class.
 *
 * @author Daniele D'Angeli <dangeli88.daniele@gmail.com>
 */
abstract class AbstractBetfair
{
    const END_POINT_URL = "https://api.betfair.com/exchange/betting/json-rpc/v1";

    protected $credential;

    protected $httpClient;

    protected $endPointUrl;

    protected $adapter;

    /**
     * @param Credentials $credential
     * @param JsonRPCClient $jsonRpcClient
     * @param AdapterInterface $adapter
     */
    public function __construct(Credentials $credential, JsonRPCClient $jsonRpcClient, AdapterInterface $adapter)
    {
        $this->credential = $credential;
        $this->httpClient = $jsonRpcClient;
        $this->endPointUrl = self::END_POINT_URL;
        $this->adapter = $adapter;
    }

    /**
     * @param MarketFilter $filter
     * @return Param
     */
    public function buildParam(MarketFilter $filter)
    {
        $param = new Param($filter);
        return $param;
    }

    /**
     * @param $method
     * @param $params
     * @return mixed
     */
    public function buildSportApiNgRequest($method, $params)
    {
        $requestContent = $this->httpClient->sportsApingRequest(
            $this->credential->getApplicationKey(),
            $this->credential->getSessionToken(),
            $method,
            $params
        );
        return $requestContent;
    }

    public function getAll($method)
    {
        $response = $this->buildSportApiNgRequest($method, FilterHelper::getEmptyFilter());
        return $this->adapter->adaptResponse($response);
    }

    public function executeCustomQuery(Param $param, $method)
    {
        $response = $this->buildSportApiNgRequest($method, json_encode($param));
        return $this->adapter->adaptResponse($response);
    }


} 