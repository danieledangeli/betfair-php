<?php

namespace spec\Betfair\Client;

use Betfair\Credential;
use Betfair\CredentialInterface;
use Betfair\Credentials;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BetfairClientSpec extends ObjectBehavior
{
    function let(CredentialInterface $credential)
    {
        $this->beConstructedWith($credential);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Client\BetfairClient');
    }

    function it_is_have_getTitle(CredentialInterface $credential)
    {
        $credential->getUsername()->willReturn('username');
        $this->getUsername()->shouldReturn('username');
    }

    function it_is_have_getPassword(CredentialInterface $credential)
    {
        $credential->getPassword()->willReturn('pwd');
        $this->getPassword()->shouldReturn('pwd');
    }


}
