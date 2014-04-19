<?php

namespace spec\Betfair\Event;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\Client\JsonRpcClient;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;
use Betfair\Event\Event;
use Betfair\Helper\FilterHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


class EventSpec extends ObjectBehavior
{
    protected $client;
    protected $adapterInterface;
    function let(
        BetfairClientInterface $client,
        AdapterInterface $adapterInterface,
        BetfairContainer $container
    )
    {
        $this->client = $client;
        $this->adapterInterface = $adapterInterface;


        $this->beConstructedWith($this->client, $this->adapterInterface, $container);
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
            Event::METHOD,
            FilterHelper::getEmptyFilter(),
            'https://api.betfair.com/exchange/betting/json-rpc/v1')
            ->willReturn('{ciao}');

        $this->adapterInterface->adaptResponse('{ciao}')->willReturn(array('ciao'));

        $this->listEvents()->shouldReturn(array('ciao'));
    }
}
