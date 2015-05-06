<?php
/**
 * Created by PhpStorm.
 * User: danieledangeli
 * Date: 06/05/15
 * Time: 19:19
 */

namespace spec\Betfair\Model\PlaceOrders;

use Betfair\Model\PlaceOrders\PersistenceType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LimitOrderSpec extends ObjectBehavior
{
    public function let()
    {
        $size = 2.45;
        $price = 1.34;
        $persistenceType = PersistenceType::MARKET_ON_CLOSE;

        $this->beConstructedWith($size, $price, $persistenceType);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Model\PlaceOrders\LimitOrder');
    }

    public function it_validate_persistence_type_on_construction()
    {
        $size = 2.45;
        $price = 1.34;
        $persistenceType = "dsz";

        $this->shouldThrow('Betfair\Exception\ModelException')->during('__construct', [$size, $price, $persistenceType]);
    }

    public function it_gets_size()
    {
        $this->getSize()->shouldBeEqualTo(2.45);
    }

    public function it_gets_price()
    {
        $this->getPrice()->shouldBeEqualTo(1.34);
    }

    public function it_gets_persistence_type()
    {
        $this->getPersistenceType()->shouldBeEqualTo(PersistenceType::MARKET_ON_CLOSE);
    }
}