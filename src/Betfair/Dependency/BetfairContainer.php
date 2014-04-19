<?php

namespace Betfair\Dependency;


use Betfair\Factory\MarketFilterFactory;
use Betfair\Factory\ParamFactory;

class BetfairContainer extends Pimple
{
    public function __construct()
    {
        parent::__construct();

        $this['betfair.market.filter.factory'] = function () {
            return new MarketFilterFactory();
        };
        $this['betfair.param.filter.factory'] = function () {
            return new ParamFactory();
        };
    }

    public function get($label)
    {
        return $this[$label];
    }

    public function set($label, $object)
    {
        $this[$label] = $object;
    }

} 