<?php

namespace Betfair\Dependency;


use Betfair\Factory\MarketFilterFactory;
use Betfair\Factory\ParamFactory;

class BetfairContainer extends Pimple
{
    public function __construct()
    {
        parent::__construct();
        $this['name'] = 'daniele dangeli';
        $this['betfair.market.filter.factory'] = function () { return new MarketFilterFactory(); };
        $this['betfair.param.filter.factory'] = function () { return new ParamFactory(); };
    }

} 