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
use Betfair\JsonRPCClient;
use Betfair\Model\MarketFilter;

class Event extends AbstractBetfair
{
    /**
     * The API METHOD NAME
     */
    const METHOD = "listEvents";

    public function __construct(Credentials $credential, JsonRPCClient $jsonRpcClient, AdapterInterface $adapter)
    {
        parent::__construct($credential, $jsonRpcClient, $adapter);
    }

    public function listEvents()
    {
        return $this->getAll(self::METHOD);
    }

    public function getAllEventFilteredByEventTypeIds(array $eventTypeIds)
    {
        $filter = new MarketFilter();
        $filter->setEventTypeIds($eventTypeIds);
        $param = $this->buildParam($filter);
        $response = $this->buildSportApiNgRequest(self::METHOD, json_encode($param));
        return $this->adapter->adaptResponse($response);
    }


} 