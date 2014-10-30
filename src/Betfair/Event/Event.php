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
    const METHOD = "listEvents";


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
        return $this->getAll(self::METHOD);
    }

    /**
     * @param array $eventTypeIds
     * @return mixed
     */
    public function getAllEventFilteredByEventTypeIds(array $eventTypeIds)
    {
        $marketFilter = $this->getMarketFilter();
        $marketFilter->setEventTypeIds($eventTypeIds);
        $param = $this->getParamFilter($marketFilter);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::METHOD, json_encode($param))
        );
    }

    /**
     * @param array $eventTypeIds
     * @return mixed
     */
    public function getAllEventsFilteredByCompetition(array $competitionIds)
    {
        $marketFilter = $this->getMarketFilter();
        $marketFilter->setCompetitionIds($competitionIds);

        $param = $this->getParamFilter($marketFilter);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::METHOD, json_encode($param))
        );
    }


} 