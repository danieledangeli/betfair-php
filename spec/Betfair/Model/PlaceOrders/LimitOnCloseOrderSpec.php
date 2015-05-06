<?php

namespace spec\Betfair\Model\PlaceOrders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LimitOnCloseOrderSpec extends ObjectBehavior
{
    public function let()
    {
        $liability = 2.45;
        $price = 1.34;

        $this->beConstructedWith($liability, $price);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Model\PlaceOrders\LimitOnCloseOrder');
    }

    public function it_gets_liability()
    {
        $this->getLiability()->shouldBeEqualTo(2.45);
    }
    public function it_gets_price()
    {
        $this->getPrice()->shouldBeEqualTo(1.34);
    }
}
