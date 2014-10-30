<?php

namespace spec\Betfair;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CredentialsSpec extends ObjectBehavior
{
    function let()
    {
        $applicationKey = '5s4a5';
        $username = 'daniele';
        $password = 'pippo';

        $this->beConstructedWith($applicationKey, $username, $password);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Credential');
        $this->shouldImplement('Betfair\CredentialInterface');
    }

    function it_is_have_getPassword()
    {
        $this->getPassword()->shouldReturn('pippo');
    }

    function it_is_have_getUsername()
    {
        $this->getUsername()->shouldReturn('daniele');
    }

    function it_is_have_getApplicationKey()
    {
        $this->getUsername()->shouldReturn('5s4a5');
    }
}
