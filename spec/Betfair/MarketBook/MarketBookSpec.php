<?php

namespace spec\Betfair\MarketBook;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MarketBookSpec extends ObjectBehavior
{
    function let(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapterInterface,
        BetfairContainer $container
    )
    {

        $this->beConstructedWith($betfairClient, $adapterInterface, $container);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\MarketBook\MarketBook');
    }
}
