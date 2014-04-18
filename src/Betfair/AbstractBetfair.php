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


    protected $container;

    /**
     * @param BetfairClientInterface $betfairClient
     * @param AdapterInterface $adapter
     */
    public function __construct(BetfairClientInterface $betfairClient, AdapterInterface $adapter)
    {
        $this->betfairClient = $betfairClient;
        $this->adapter    = $adapter;
        $this->endPointUrl = self::END_POINT_URL;
        $this->container = new BetfairContainer();
    }

    /**
     * @param $operation
     * @param $params
     * @return mixed
     */
    public function doSportApiNgRequest($operation, $params)
    {
        $requestContent = $this->betfairClient->sportsApingRequest(
            $operation,
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