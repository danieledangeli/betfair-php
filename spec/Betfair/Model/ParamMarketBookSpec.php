<?php

namespace spec\Betfair\Model;

use PhpSpec\ObjectBehavior;

class ParamMarketBookSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Model\ParamMarketBook');
    }

    function it_serializable()
    {
        $this->setMarketIds(array(1,2));
        $this->jsonSerialize()->shouldReturn(array('marketIds' => array(1,2)));
    }

} 