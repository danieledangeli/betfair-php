<?php

namespace spec\Betfair\Event;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\Client\JsonRpcClient;
use Betfair\CredentialInterface;
use Betfair\Event\Event;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Helper\FilterHelper;
use Betfair\Model\MarketFilterInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


class EventSpec extends ObjectBehavior
{
    protected $client;
    protected $adapterInterface;
    protected $paramFactory;
    protected $marketFilterFactory;

    function let(
        BetfairClientInterface $client,
        AdapterInterface $adapterInterface,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory
    )
    {
        $this->client = $client;
        $this->adapterInterface =  $adapterInterface;
        $this->paramFactory = $paramFactory;
        $this->marketFilterFactory = $marketFilterFactory;

        $this->beConstructedWith(
            $this->client,
            $this->adapterInterface,
            $this->paramFactory,
            $this->marketFilterFactory
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Event\Event');
    }

    function it_has_list_events(
        BetfairClientInterface $client,
        AdapterInterface $adapter
    )
    {
        $client->sportsApiNgRequest(
            Event::API_METHOD_NAME,
            FilterHelper::getEmptyFilter(),
            'https://api.betfair.com/exchange/betting/json-rpc/v1')
            ->willReturn('{ciao}');

        $this->adapterInterface->adaptResponse('{ciao}')->willReturn(array('ciao'));

        $this->listEvents()->shouldReturn(array('ciao'));
    }
}
