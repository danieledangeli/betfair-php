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

    function it_do_sport_api_ng_request(CredentialInterface $credential, BetfairJsonRpcClientInterface $httpClient)
    {
        $httpClient->sportsApiNgRequest($credential, 'op1', array(1,2), "url.com")
            ->shouldBeCalled()
            ->willReturn("HTTP response");

        $this->sportsApiNgRequest("op1", array(1,2), "url.com")->shouldReturn("HTTP response");
    }
}
