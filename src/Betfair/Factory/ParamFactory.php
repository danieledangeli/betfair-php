<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\Factory;

use Betfair\Model\MarketFilterInterface;
use Betfair\Model\Param;
use Betfair\Model\ParamMarketBook;

class ParamFactory implements ParamFactoryInterface
{
    public function create(MarketFilterInterface $marketFilter)
    {
       return new Param($marketFilter);
    }

    public function createParamMarketBook()
    {
        return new ParamMarketBook();
    }
}
