<?php

namespace spec\Betfair\Event;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\Client\JsonRpcClient;
use Betfair\CredentialInterface;
use Betfair\Event\Event;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactory;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Helper\FilterHelper;
use Betfair\Model\MarketFilterInterface;
use Betfair\Model\ParamInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


class EventSpec extends AbstractEventSpec
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
        $this->shouldHaveType('Betfair\Event\Event');
    }

    function it_has_list_events(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapterInterface,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory,
        ParamInterface $paramInterface,
        MarketFilterInterface $marketFilterInterface
    )
    {
        $this->it_create_empty_param_filter($marketFilterFactory, $paramFactory, $marketFilterInterface, $paramInterface);

        $betfairClient->sportsApiNgRequest(Event::API_METHOD_NAME, $paramInterface)
            ->shouldBeCalled()
            ->willReturn("{response}");

        $adapterInterface->adaptResponse("{response}")->willReturn(array("response"));
        $this->listEvents()->shouldReturn(array("response"));
    }
}
