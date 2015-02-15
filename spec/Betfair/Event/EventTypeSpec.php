<?php

namespace spec\Betfair\Event;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;
use Betfair\Event\EventType;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Model\MarketFilterInterface;
use Betfair\Model\ParamInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventTypeSpec extends AbstractEventSpec
{
    protected $client;
    protected $adapterInterface;
    protected $paramFactory;
    protected $marketFilterFactory;

    function let(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapterInterface,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory
    )
    {
        $this->beConstructedWith(
            $betfairClient,
            $adapterInterface,
            $paramFactory,
            $marketFilterFactory
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Event\EventType');
    }

    function it_return_all_event_type(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapterInterface,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory,
        ParamInterface $paramInterface,
        MarketFilterInterface $marketFilterInterface
    )
    {
        $this->it_create_empty_param_filter($marketFilterFactory, $paramFactory, $marketFilterInterface, $paramInterface);

        $betfairClient->sportsApiNgRequest(EventType::API_METHOD_NAME, $paramInterface)
            ->shouldBeCalled()
            ->willReturn("{response}");

        $adapterInterface->adaptResponse("{response}")->willReturn(array("response"));

        $this->getAllEventType()->shouldReturn(array("response"));
    }

    function it_return_all_event_type_filtered_by_ids(
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

        $marketFilterInterface->setEventTypeIds($eventTypeIds)->shouldBeCalled();

        $betfairClient->sportsApiNgRequest(EventType::API_METHOD_NAME, $paramInterface)
            ->shouldBeCalled()
            ->willReturn("{response}");

        $adapterInterface->adaptResponse("{response}")->willReturn(array("response"));

        $this->getAllEventFilterByIds($eventTypeIds)->shouldReturn(array("response"));
    }
}
