<?php

namespace spec\Betfair\Event;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\Client\JsonRpcClient;
use Betfair\CredentialInterface;
use Betfair\Event\Event;
use Betfair\Helper\FilterHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


class EventSpec extends ObjectBehavior
{
    protected $credentials;
    protected $adapterInterface;
    function let(
        CredentialInterface $credentials,
        AdapterInterface $adapterInterface,
        BetfairJsonRpcClientInterface $jsonRPCClient
    )
    {
        $this->credentials = $credentials;
        $this->adapterInterface = $adapterInterface;


        $this->beConstructedWith($this->credentials, $jsonRPCClient, $this->adapterInterface);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Event\Event');
    }

    function it_has_list_events(
        BetfairJsonRpcClientInterface $jsonRPCClient,
        CredentialInterface $credential,
        AdapterInterface $adapter
    )
    {
        $jsonRPCClient->sportsApiNgRequest(
            $this->credentials,
            Event::METHOD,
            FilterHelper::getEmptyFilter(),
            'https://api.betfair.com/exchange/betting/json-rpc/v1')
            ->willReturn('{ciao}');

        $this->adapterInterface->adaptResponse('{ciao}')->willReturn(array('ciao'));

        $this->listEvents()->shouldReturn(array('ciao'));
    }
}
