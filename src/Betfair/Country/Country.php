<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\Country;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Dependency\BetfairContainer;

class Country extends AbstractBetfair
{
    public function __construct(BetfairClientInterface $client, AdapterInterface $adapter, BetfairContainer $container)
    {
        parent::__construct($client, $adapter, $container);
    }
}
