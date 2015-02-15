<?php

namespace spec\Betfair\MarketCatalogue;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\MarketCatalogue\MarketCatalogue;
use Betfair\Model\MarketFilterInterface;
use Betfair\Model\MarketProjection;
use Betfair\Model\ParamInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\Betfair\AbstractBetfairObjectSpec;

class MarketCatalogueSpec extends AbstractBetfairObjectSpec
{
    protected $client;
    protected $adapterInterface;
    protected $paramFactory;
    protected $marketFilterFactory;

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\MarketCatalogue\MarketCatalogue');
    }

    function it_get_market_catalogue_filtered_by_event(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapterInterface,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory,
        ParamInterface $paramInterface,
        MarketFilterInterface $marketFilterInterface
    )
    {
        $eventIds = array(1,2);

        $this->it_create_empty_param_filter($marketFilterFactory, $paramFactory, $marketFilterInterface, $paramInterface);

        $betfairClient->sportsApiNgRequest(MarketCatalogue::API_METHOD_NAME, $paramInterface)
            ->shouldBeCalled()
            ->willReturn("{response}");

        $marketFilterInterface->setEventIds($eventIds)->shouldBeCalled();
        $paramInterface->setMarketProjection(MarketProjection::getAll())->shouldBeCalled();
        $paramInterface->setMaxResults(MarketCatalogue::DEFAULT_MAX_RESULT)->shouldBeCalled();

        $adapterInterface->adaptResponse("{response}")->willReturn(array("response"));
        $this->getMarketCatalogueFilteredByEventIds($eventIds)->shouldReturn(array("response"));
    }

    function it_list_market_catalogue(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapterInterface,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory,
        ParamInterface $paramInterface,
        MarketFilterInterface $marketFilterInterface
    )
    {
        $eventTypeIds = array(1,2);
        $this->it_create_empty_param_filter($marketFilterFactory, $paramFactory, $marketFilterInterface, $paramInterface);

        $marketFilterInterface->setEventTypeIds($eventTypeIds);
        $betfairClient->sportsApiNgRequest(MarketCatalogue::API_METHOD_NAME, $paramInterface)
            ->shouldBeCalled()
            ->willReturn("{response}");

        $adapterInterface->adaptResponse("{response}")->willReturn(array("response"));
        $this->listMarketCatalogue($eventTypeIds)->shouldReturn(array("response"));
    }

    function it_get_market_catalogue_filtered_by(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapterInterface,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory,
        ParamInterface $paramInterface,
        MarketFilterInterface $marketFilterInterface
    )
    {
        $eventIds = array(1,2);
        $marketTypeCodes = array(1234,5555);

        $this->it_create_empty_param_filter($marketFilterFactory, $paramFactory, $marketFilterInterface, $paramInterface);
        $marketFilterInterface->setEventIds($eventIds)->shouldBeCalled();
        $marketFilterInterface->setMarketTypeCodes($marketTypeCodes)->shouldBeCalled();
        $paramInterface->setMarketProjection(MarketProjection::getAll())->shouldBeCalled();
        $paramInterface->setMaxResults(MarketCatalogue::DEFAULT_MAX_RESULT)->shouldBeCalled();

        $betfairClient->sportsApiNgRequest(MarketCatalogue::API_METHOD_NAME, $paramInterface)
            ->shouldBeCalled()
            ->willReturn("{response}");

        $adapterInterface->adaptResponse("{response}")->willReturn(array("response"));
        $this->getMarketCatalogueFilteredBy($eventIds, $marketTypeCodes)->shouldReturn(array("response"));
    }
}
