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
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\Dependency\BetfairContainer;
use Betfair\Helper\FilterHelper;
use Betfair\Model\MarketFilter;
use Betfair\Model\MarketFilterInterface;
use Betfair\Model\Param;
use Betfair\Model\ParamInterface;
use Betfair\Model\QueryManager;

abstract class AbstractBetfair
{
    const END_POINT_URL = "https://api.betfair.com/exchange/betting/json-rpc/v1";

    protected $credential;

    protected $httpClient;

    protected $endPointUrl;

    protected $adapter;

    /** @var \Betfair\Model\QueryManager  */
    protected $queryManager;


    protected $container;

    /**
     * @param CredentialInterface $credential
     * @param BetfairJsonRpcClientInterface $jsonRpcClient
     * @param AdapterInterface $adapter
     */
    public function __construct(CredentialInterface $credential, BetfairJsonRpcClientInterface $jsonRpcClient, AdapterInterface $adapter)
    {
        $this->credential = $credential;
        $this->httpClient = $jsonRpcClient;
        $this->adapter    = $adapter;
        $this->endPointUrl = self::END_POINT_URL;
        $this->container = new BetfairContainer();
    }

    /**
     * @param MarketFilterInterface $filter
     * @return Param
     */
    public function buildParam(MarketFilterInterface $filter)
    {
        $param = new Param($filter);
        return $param;
    }

    /**
     * @param $method
     * @param $params
     * @return mixed
     */
    public function doSportApiNgRequest($method, $params)
    {
        $requestContent = $this->httpClient->sportsApingRequest(
            $this->credential,
            $method,
            $params,
            $this->endPointUrl
        );
        return $requestContent;
    }

    public function getAll($method)
    {
        $response = $this->doSportApiNgRequest($method, FilterHelper::getEmptyFilter());
        return $this->adapter->adaptResponse($response);
    }

    public function executeCustomQuery(ParamInterface $param, $method)
    {
        $response = $this->doSportApiNgRequest($method, json_encode($param));
        return $this->adapter->adaptResponse($response);
    }


} 