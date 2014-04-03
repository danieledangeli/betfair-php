<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\Event;


use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Credentials;
use Betfair\Helper\FilterHelper;
use Betfair\JsonRPCClient;

class MarketBook extends AbstractBetfair
{
    /**
     * The API METHOD NAME
     */
    const METHOD = "listMarketBook";

    /**
     * @param Credentials $credential
     * @param JsonRPCClient $jsonRpcClient
     * @param AdapterInterface $adapter
     */
    public function __construct(Credentials $credential, JsonRPCClient $jsonRpcClient, AdapterInterface $adapter)
    {
        parent::__construct($credential, $jsonRpcClient, $adapter);

    }

    public function listMarketBook()
    {

    }


} 