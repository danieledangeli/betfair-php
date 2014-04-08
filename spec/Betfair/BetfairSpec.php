<?php

namespace spec\Betfair;

use Betfair\Adapter\AdapterInterface;
use Betfair\Credentials;
use Betfair\JsonRpcClient;
use PhpSpec\ObjectBehavior;

class BetfairSpec extends ObjectBehavior
{

    function let(
        Credentials $credentials,
        AdapterInterface $adapterInterface,
        JsonRpcClient $jsonRPCClient
    )
    {

        $this->beConstructedWith($credentials, $adapterInterface, $jsonRPCClient);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Betfair');
    }
}
