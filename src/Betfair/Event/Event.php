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
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Credentials;
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

    public function __construct(
        CredentialInterface $credential,
        BetfairJsonRpcClientInterface $jsonRpcClient,
        AdapterInterface $adapter)
    {
        parent::__construct($credential, $jsonRpcClient, $adapter);
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
        $marketFilter = $this->container['betfair.market.filter.factory']->create();
        $marketFilter->setEventTypeIds($eventTypeIds);

        $param = $this->container['betfair.param.filter.factory']->create($marketFilter);
        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::METHOD, json_encode($param))
        );
    }


} 