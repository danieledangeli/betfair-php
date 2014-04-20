<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Dependency\BetfairContainer;
use Betfair\Model\ParamInterface;

class BetfairGeneric extends AbstractBetfair
{
    public function __construct(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapter,
        BetfairContainer $container
    )
    {
        parent::__construct($betfairClient, $adapter, $container);
    }

    public function executeCustomQuery(ParamInterface $param, $method)
    {
        return parent::executeCustomQuery($param, $method);
    }
} 