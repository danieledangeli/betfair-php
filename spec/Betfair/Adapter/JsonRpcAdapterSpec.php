<?php

namespace spec\Betfair\Adapter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JsonRpcAdapterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Adapter\JsonRpcAdapter');
    }
}
