<?php

namespace spec\Betfair\Client;

use Betfair\Credentials;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BetfairClientSpec extends ObjectBehavior
{
    function let(Credentials $credential)
    {
        $this->beConstructedWith($credential);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Client\BetfairClient');
    }

    function it_is_have_getTitle(Credentials $credential)
    {
        $credential->getUsername()->willReturn('username');
        $this->getUsername()->shouldReturn('username');
    }

    function it_is_have_getPassword(Credentials $credential)
    {
        $credential->getPassword()->willReturn('pwd');
        $this->getPassword()->shouldReturn('pwd');
    }


}
