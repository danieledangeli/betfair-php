<?php

namespace spec\Betfair\MarketCatalogue;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MarketCatalogueSpec extends ObjectBehavior
{
    function let(
        BetfairClientInterface $client,
        AdapterInterface $adapterInterface
    )
    {

        $this->beConstructedWith($client, $adapterInterface);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\MarketCatalogue\MarketCatalogue');
    }
}
