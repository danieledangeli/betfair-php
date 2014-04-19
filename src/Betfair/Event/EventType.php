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
use Betfair\Helper\FilterHelper;
use Betfair\JsonRPCClient;
use Betfair\Model\MarketFilter;
use Betfair\Model\Param;

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
     */
    public function __construct(BetfairClientInterface $betfairClient, AdapterInterface $adapter, BetfairContainer $container)
    {
        parent::__construct($betfairClient, $adapter, $container);
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
        $marketFilter = $this->container['betfair.market.filter.factory']->create();
        $marketFilter->setEventTypeIds($eventTypeIds);

        $param = $this->container['betfair.param.filter.factory']->create($marketFilter);

        $response = $this->doSportApiNgRequest(self::METHOD, json_encode($param));
        return $this->adapter->adaptResponse($response);
    }

} 