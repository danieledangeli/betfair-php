<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\MarketBook;

use Betfair\AbstractBetfair;
use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Dependency\BetfairContainer;
use Betfair\Factory\MarketFilterFactory;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactory;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Model\MarketFilter;
use Betfair\Model\Param;
use Betfair\Model\ParamMarketBook;

class MarketBook extends AbstractBetfair
{
    const METHOD = "listMarketBook";

    /**
     * @param BetfairClientInterface $betfairClient
     * @param AdapterInterface $adapter
     * @param ParamFactory $paramFactory
     * @param MarketFilterFactory $marketFilterFactory
     */
    public function __construct(
        BetfairClientInterface $betfairClient,
        AdapterInterface $adapter,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory
    )
    {
        parent::__construct($betfairClient, $adapter, $paramFactory, $marketFilterFactory);
    }
    public function getMarketBookFilterByMarketIds(array $marketIds)
    {
        $param = $this->getParamMarketBook();
        $param->setMarketIds($marketIds);

        return $this->adapter->adaptResponse(
            $this->doSportApiNgRequest(self::METHOD, json_encode($param))
        );
    }

}
