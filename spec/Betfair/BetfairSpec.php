<?php

namespace spec\Betfair;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BetfairSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Betfair');
    }
}
