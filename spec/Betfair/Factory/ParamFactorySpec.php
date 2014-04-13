<?php

namespace spec\Betfair\Factory;

use Betfair\Model\MarketFilterInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParamFactorySpec extends ObjectBehavior
{
    function let(MarketFilterInterface $marketFilter)
    {

    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Factory\ParamFactory');
    }

    function it_is_have_create(MarketFilterInterface $marketFilter)
    {
        $this->create($marketFilter)->shouldReturnAnInstanceOf('Betfair\Model\ParamInterface');
    }
}
