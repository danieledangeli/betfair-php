<?php

namespace spec\Betfair\Adapter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArrayRpcAdapterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Adapter\ArrayRpcAdapter');
    }

    function it_have_adaptResponse()
    {
        $this->adaptResponse('{"jsonrpc": "2.0", "result": [{"eventType": { "id": "468328","name": "Handball"}], "id": 1}')
            ->shouldReturn(json_decode(('{"eventType": { "id": "468328","name": "Handball"}')));
    }
}
