<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
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