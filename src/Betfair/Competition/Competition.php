<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\Competition;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Dependency\BetfairContainer;

/**
 * Class Competition
 * @package Betfair\Competition
 */
class Competition extends AbstractBetfair
{
    /**
     * @param BetfairClientInterface $betfairClient
     * @param AdapterInterface $adapter
     * @param BetfairContainer $container
     */
    public function __construct(BetfairClientInterface $betfairClient, AdapterInterface $adapter, BetfairContainer $container)
    {
        parent::__construct($betfairClient, $adapter, $container);
    }
}
