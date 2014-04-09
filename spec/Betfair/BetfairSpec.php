<?php

namespace spec\Betfair;

use Betfair\Adapter\AdapterInterface;
use Betfair\BetfairJsonRpcClientInterface;
use Betfair\Credential;
use Betfair\CredentialInterface;
use Betfair\Credentials;
use Betfair\JsonRpcClient;
use PhpSpec\ObjectBehavior;

class BetfairSpec extends ObjectBehavior
{

    function let(
        CredentialInterface $credentials,
        AdapterInterface $adapterInterface,
        BetfairJsonRpcClientInterface $jsonRPCClient
    )
    {

        $this->beConstructedWith($credentials, $adapterInterface, $jsonRPCClient);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Betfair');
    }
}
