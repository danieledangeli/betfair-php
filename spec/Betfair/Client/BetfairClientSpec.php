<?php

namespace spec\Betfair\Client;

use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\Credential;
use Betfair\CredentialInterface;
use Betfair\Credentials;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BetfairClientSpec extends ObjectBehavior
{
    function let(CredentialInterface $credential, BetfairJsonRpcClientInterface $httpClient)
    {
        $this->beConstructedWith($credential, $httpClient);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Client\BetfairClient');
    }
}
