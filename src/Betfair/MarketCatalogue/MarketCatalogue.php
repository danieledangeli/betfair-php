<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\MarketCatalogue;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;
use Betfair\Factory\MarketFilterFactory;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactory;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Model\MarketFilter;
use Betfair\Model\MarketProjection;
use Betfair\Model\Param;

class MarketCatalogue extends AbstractBetfair
{
    /**
     * The API METHOD NAME
     */
    const METHOD = "listMarketCatalogue";
    const DEFAULT_MAX_RESULT = "100";

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

    public function listMarketCatalogue(array $eventTypes)
    {
        $filter = $this->getMarketFilter();
        $filter->setEventTypeIds($eventTypes);

        $param = $this->getParamFilter($filter);
        $param->setMarketProjection(MarketProjection::getAll());
        $param->setMaxResults(self::DEFAULT_MAX_RESULT);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::METHOD, json_encode($param))
        );
    }

    public function getMarketCatalogueFilteredByEvent(array $eventIds)
    {
        $marketFilter = $this->getMarketFilter();
        $marketFilter->setEventIds($eventIds);

        $param = $this->getParamFilter($marketFilter);
        $param->setMarketProjection(MarketProjection::getAll());
        $param->setMaxResults(self::DEFAULT_MAX_RESULT);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::METHOD, json_encode($param))
        );
    }

    public function getMarketCatalogueFilteredBy(array $eventIds, array $marketTypes)
    {
        $marketFilter = $this->getMarketFilter();
        $marketFilter->setEventIds($eventIds);
        $marketFilter->setMarketTypeCodes($marketTypes);

        /** @var Param $param */
        $param = $this->getParamFilter($marketFilter);
        $param->setMarketProjection(MarketProjection::getAll());
        $param->setMaxResults(self::DEFAULT_MAX_RESULT);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::METHOD, json_encode($param))
        );
    }

} 