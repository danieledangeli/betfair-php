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
use Betfair\Credentials;
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
     * @param Credentials $credential
     * @param JsonRPCClient $jsonRpcClient
     * @param AdapterInterface $adapter
     */
    public function __construct(Credentials $credential, JsonRPCClient $jsonRpcClient, AdapterInterface $adapter)
    {
        parent::__construct($credential, $jsonRpcClient, $adapter);
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
        $filter = new MarketFilter();
        $filter->setEventTypeIds($eventTypeIds);
        $param = $this->buildParam($filter);
        $response = $this->buildSportApiNgRequest(self::METHOD, json_encode($param));
        return $this->adapter->adaptResponse($response);
    }

} 