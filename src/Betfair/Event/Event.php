<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\Event;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Credentials;
use Betfair\Dependency\BetfairContainer;
use Betfair\Factory\MarketFilterFactory;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactory;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Helper\FilterHelper;
use Betfair\JsonRPCClient;
use Betfair\Model\MarketFilter;

/**
 * Class Event
 * @package Betfair\Event
 */
class Event extends AbstractBetfair
{
    /**
     * The API METHOD NAME
     */
    const API_METHOD_NAME = "listEvents";


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
        parent::__construct($betfairClient, $adapter, $paramFactory, $marketFilterFactory);
    }

    /**
     * @return mixed
     */
    public function listEvents()
    {
        $response = $this->doSportApiNgRequest(
            self::API_METHOD_NAME,
            $this->createParamFilter($this->createMarketFilter())
        );

        return $this->adapter->adaptResponse($response);
    }

    /**
     * @param array $eventTypeIds
     * @return mixed
     */
    public function getAllEventFilteredByEventTypeIds(array $eventTypeIds)
    {
        $marketFilter = $this->createMarketFilter();
        $marketFilter->setEventTypeIds($eventTypeIds);
        $param = $this->createParamFilter($marketFilter);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::API_METHOD_NAME, $param)
        );
    }

    /**
     * @param array $eventTypeIds
     * @return mixed
     */
    public function getAllEventsFilteredByCompetition(array $competitionIds)
    {
        $marketFilter = $this->createMarketFilter();
        $marketFilter->setCompetitionIds($competitionIds);

        $param = $this->createParamFilter($marketFilter);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::API_METHOD_NAME, $param)
        );
    }


} 