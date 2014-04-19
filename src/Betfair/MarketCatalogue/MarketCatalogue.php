<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\MarketCatalogue;


use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;
use Betfair\Model\MarketFilter;
use Betfair\Model\Param;

class MarketCatalogue extends AbstractBetfair
{
    /**
     * The API METHOD NAME
     */
    const METHOD = "listMarketCatalogue";

    const DEFAULT_MAX_RESULT = "10";


    /**
     * @param CredentialInterface $credential
     * @param BetfairJsonRpcClientInterface $jsonRpcClient
     * @param AdapterInterface $adapter
     */
    public function __construct(BetfairClientInterface $betfairClient, AdapterInterface $adapter, BetfairContainer $container)
    {
        parent::__construct($betfairClient, $adapter, $container);
    }

    public function listMarketCatalogue()
    {
        $filter = new MarketFilter();
        $filter->setEventTypeIds(array(1));
        $param = $this->buildParam($filter);
        $param->setMaxResults(self::DEFAULT_MAX_RESULT);

        $response = $this->doSportApiNgRequest(self::METHOD, json_encode($param));
        return $this->adapter->adaptResponse($response);
    }

} 