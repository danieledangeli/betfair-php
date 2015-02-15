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
use Betfair\Client\BetfairClient;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\Dependency\BetfairContainer;
use Betfair\Factory\MarketFilterFactory;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactory;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Helper\FilterHelper;
use Betfair\Model\MarketFilter;
use Betfair\Model\MarketFilterInterface;
use Betfair\Model\Param;
use Betfair\Model\ParamInterface;
use Betfair\Model\QueryManager;

abstract class AbstractBetfair
{
    const END_POINT_URL = "https://api.betfair.com/exchange/betting/json-rpc/v1";

    protected $betfairClient;

    protected $endPointUrl;

    protected $adapter;

    /** @var \Betfair\Model\QueryManager  */
    protected $queryManager;

    protected $marketFilterFactory;

    protected $paramFilterFactory;

    /**
     * @param BetfairClientInterface $betfairClient
     * @param AdapterInterface $adapter
     * @param ParamFactoryInterface $paramFactory
     * @param MarketFilterFactoryInterface $marketFilterFactory
     */
    public function __construct(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapter,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory
    )
    {
        $this->betfairClient = $betfairClient;
        $this->adapter    = $adapter;
        $this->endPointUrl = self::END_POINT_URL;
        $this->marketFilterFactory = $marketFilterFactory;
        $this->paramFilterFactory =  $paramFactory;
    }

    /**
     * @param $operation
     * @param \Betfair\Model\Param|\Betfair\Model\ParamInterface $param
     * @internal param $params
     * @return mixed
     */
    public function doSportApiNgRequest($operation, ParamInterface $param)
    {
        $requestContent = $this->betfairClient->sportsApingRequest(
            $operation,
            $param
        );

        return $requestContent;
    }

    public function executeCustomQuery(ParamInterface $param, $method = null)
    {
        $method = $method !== null ? $method : $this::API_METHOD_NAME;
        $response = $this->doSportApiNgRequest($method, $param);
        return $this->adapter->adaptResponse($response);
    }

    public function createMarketFilter()
    {
        return $this->marketFilterFactory->create();
    }

    public function createParamFilter(MarketFilterInterface $marketFilterInterface)
    {
        return $this->paramFilterFactory->create($marketFilterInterface);
    }

    public function createParamMarketBook()
    {
        return $this->paramFilterFactory->createParamMarketBook();
    }

} 