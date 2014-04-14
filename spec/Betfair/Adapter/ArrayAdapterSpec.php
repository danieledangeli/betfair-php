<?php

namespace spec\Betfair\Adapter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArrayAdapterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Adapter\ArrayAdapter');
    }

    function it_have_adaptResponse()
    {
        $this->adaptResponse('{"ciao" : "hello"}')->shouldReturn(array('ciao' => 'hello'));
    }
}
