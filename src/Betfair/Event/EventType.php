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
use Betfair\Dependency\BetfairContainer;
use Betfair\Factory\MarketFilterFactory;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactory;
use Betfair\Factory\ParamFactoryInterface;

class EventType extends AbstractBetfair
{
    /**
     * The API METHOD NAME
     */
    const METHOD = "listEventTypes";

    const EVENT_TYPE_IDS_FILTER = "eventTypeIds";

    /**
     * @param BetfairClientInterface $betfairClient
     * @param AdapterInterface $adapter
     * @param ParamFactory $paramFactory
     * @param MarketFilterFactory $marketFilterFactory
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
     * @return \Betfair\Adapter\adapted
     */
    public function getAllEventType()
    {
        return $this->getAll(self::METHOD);
    }

    /**
     * @param $eventTypeIds
     * @return \Betfair\Adapter\adapted
     */
    public function getAllEventFilterByIds($eventTypeIds)
    {
        $marketFilter = $this->getMarketFilter();
        $marketFilter->setEventTypeIds($eventTypeIds);

        $param = $this->getParamFilter($marketFilter);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::METHOD, json_encode($param))
        );
    }

} 