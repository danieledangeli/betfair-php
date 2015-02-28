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
use Betfair\Adapter\ArrayAdapter;
use Betfair\Adapter\ArrayRpcAdapter;
use Betfair\Client\BetfairClientInterface;
use Betfair\BettingApi\Competition\Competition;
use Betfair\BettingApi\Country\Country;
use Betfair\BettingApi\Event\Event;
use Betfair\BettingApi\Event\EventType;
use Betfair\Factory\MarketFilterFactory;
use Betfair\Factory\ParamFactory;
use Betfair\BettingApi\MarketBook\MarketBook;
use Betfair\BettingApi\MarketCatalogue\MarketCatalogue;
use Betfair\BettingApi\TimeRange\TimeRange;
use Betfair\Model\ParamInterface;

class Betfair
{
    /**
     * Version.
     * @see http://semver.org/
     */
    const VERSION = '1.0.0-dev';

    /**
     * The adapter to use.
     *
     * @var AdapterInterface
     */
    protected $adapter;

    /** @var  BetfairClientInterface */
    protected $betfairClient;

    /** @var \Betfair\BetfairGeneric  */
    protected $genericBetfair;

    /** @var \Betfair\BetfairGeneric  */
    protected $paramFactory;

    /** @var \Betfair\Factory\MarketFilterFactory  */
    protected $marketFilterFactory;

    /** @var  BetfairGeneric */
    protected $betfairGeneric;

    public function __construct(
        BetfairClientInterface $client,
        AdapterInterface $adapter = null
    ) {
        $this->betfairClient = $client;
        $this->adapter = (null !== $adapter) ? $adapter : new ArrayRpcAdapter();
        $this->paramFactory = new ParamFactory();
        $this->marketFilterFactory = new MarketFilterFactory();
    }

    public function api(ParamInterface $param, $method)
    {
        $betfairGeneric = $this->getBetfairGeneric();
        return $betfairGeneric->executeCustomQuery($param, $method);
    }

    /**
     * @return EventType
     */
    public function getBetfairEventType()
    {
        return new EventType($this->betfairClient, $this->adapter, $this->paramFactory, $this->marketFilterFactory);
    }

    /**
     * @return BetfairGeneric
     */
    public function getBetfairGeneric()
    {
        $this->betfairGeneric = new BetfairGeneric($this->betfairClient, $this->adapter, $this->paramFactory, $this->marketFilterFactory);
        return $this->betfairGeneric;
    }
    /**
     * @return Event
     */
    public function getBetfairEvent()
    {
        return new Event($this->betfairClient, $this->adapter, $this->paramFactory, $this->marketFilterFactory);
    }

    public function getBetfairMarketCatalogue()
    {
        return new MarketCatalogue($this->betfairClient, $this->adapter, $this->paramFactory, $this->marketFilterFactory);
    }

    public function getBetfairMarketBook()
    {
        return new MarketBook($this->betfairClient, $this->adapter, $this->paramFactory, $this->marketFilterFactory);
    }

    public function getBetfairCountry()
    {
        return new Country($this->betfairClient, $this->adapter, $this->paramFactory, $this->marketFilterFactory);
    }

    public function getBetfairCompetition()
    {
        return new Competition($this->betfairClient, $this->adapter, $this->paramFactory, $this->marketFilterFactory);
    }

    public function getBetfairTimeRange()
    {
        return new TimeRange($this->betfairClient, $this->adapter, $this->paramFactory, $this->marketFilterFactory);
    }
}
