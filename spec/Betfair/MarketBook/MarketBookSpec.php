<?php

namespace spec\Betfair\MarketBook;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MarketBookSpec extends ObjectBehavior
{
    function let(

        BetfairClientInterface $betfairClient,
        AdapterInterface $adapterInterface
    )
    {

        $this->beConstructedWith($betfairClient, $adapterInterface);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\MarketBook\MarketBook');
    }
}
