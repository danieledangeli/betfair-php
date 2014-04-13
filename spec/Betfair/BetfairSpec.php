<?php

namespace spec\Betfair;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use PhpSpec\ObjectBehavior;

class BetfairSpec extends ObjectBehavior
{

    function let(
        CredentialInterface $credentials,
        AdapterInterface $adapterInterface,
        BetfairJsonRpcClientInterface $jsonRPCClient
    )
    {

        $this->beConstructedWith($credentials, $jsonRPCClient, $adapterInterface);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Betfair');
    }

    function it_is_factory_event()
    {
        $this->getBetfairEvent()->shouldReturnAnInstanceOf('Betfair\Event\Event');
    }

    function it_is_factory_eventType()
    {
        $this->getBetfairEventType()->shouldReturnAnInstanceOf('Betfair\Event\EventType');
    }

    function it_is_factory_MarketCatalogue()
    {
        $this->getBetfairMarketCatalogue()->shouldReturnAnInstanceOf('Betfair\MarketCatalogue\MarketCatalogue');
    }

    function it_is_factory_MarketBook()
    {
        $this->getBetfairMarketBook()->shouldReturnAnInstanceOf('Betfair\MarketBook\MarketBook');
    }

    function it_is_factory_Country()
    {
        $this->getBetfairCountry()->shouldReturnAnInstanceOf('Betfair\Country\Country');
    }

    function it_is_factory_Competition()
    {
        $this->getBetfairCompetition()->shouldReturnAnInstanceOf('Betfair\Competition\Competition');
    }

    function it_is_factory_TimeRange()
    {
        $this->getBetfairTimeRange()->shouldReturnAnInstanceOf('Betfair\TimeRange\TimeRange');
    }
}
