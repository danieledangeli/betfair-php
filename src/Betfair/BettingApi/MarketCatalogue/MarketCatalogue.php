<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\BettingApi\MarketCatalogue;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Model\MarketProjection;

class MarketCatalogue extends AbstractBetfair
{
    const API_METHOD_NAME = "listMarketCatalogue";
    const DEFAULT_MAX_RESULT = "100";

    /**
     * @param BetfairClientInterface $betfairClient
     * @param AdapterInterface $adapter
     * @param \Betfair\Factory\ParamFactoryInterface $paramFactory
     * @param \Betfair\Factory\MarketFilterFactoryInterface $marketFilterFactory
     */
    public function __construct(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapter,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory
    ) {
        parent::__construct($betfairClient, $adapter, $paramFactory, $marketFilterFactory);
    }

    public function listMarketCatalogue(array $eventTypes)
    {
        $filter = $this->createMarketFilter();
        $filter->setEventTypeIds($eventTypes);

        $param = $this->createParamFilter($filter);
        $param->setMarketProjection(MarketProjection::getAll());
        $param->setMaxResults(self::DEFAULT_MAX_RESULT);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::API_METHOD_NAME, $param)
        );
    }

    public function getMarketCatalogueFilteredByEventIds(array $eventIds)
    {
        $marketFilter = $this->createMarketFilter();
        $marketFilter->setEventIds($eventIds);

        $param = $this->createParamFilter($marketFilter);
        $param->setMarketProjection(MarketProjection::getAll());
        $param->setMaxResults(self::DEFAULT_MAX_RESULT);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::API_METHOD_NAME, $param)
        );
    }

    public function getMarketCatalogueFilteredBy(array $eventIds, array $marketTypes)
    {
        $marketFilter = $this->createMarketFilter();
        $marketFilter->setEventIds($eventIds);
        $marketFilter->setMarketTypeCodes($marketTypes);

        $param = $this->createParamFilter($marketFilter);
        $param->setMarketProjection(MarketProjection::getAll());
        $param->setMaxResults(self::DEFAULT_MAX_RESULT);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::API_METHOD_NAME, $param)
        );
    }
}
