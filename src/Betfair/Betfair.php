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
use Betfair\Client\BetfairClientInterface;
use Betfair\Competition\Competition;
use Betfair\Country\Country;
use Betfair\Dependency\BetfairContainer;
use Betfair\Event\Event;
use Betfair\Event\EventType;
use Betfair\MarketBook\MarketBook;
use Betfair\MarketCatalogue\MarketCatalogue;
use Betfair\TimeRange\TimeRange;

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

    /** @var  BetfairContainer */
    protected $container;

    public function __construct(BetfairClientInterface $client, BetfairContainer $container, AdapterInterface $adapter = null)
    {
        $this->betfairClient = $client;
        $this->container = $container;
        $this->setAdapter($adapter);
    }

    public function setAdapter($adapter = null)
    {
        $this->adapter = $adapter ?: new ArrayAdapter();
    }

    /**
     * @return EventType
     */
    public function getBetfairEventType()
    {
        return new EventType($this->betfairClient, $this->adapter, $this->container);
    }

    public function getBetfairGeneric()
    {
        return new BetfairGeneric($this->betfairClient, $this->adapter, $this->container);
    }
    /**
     * @return Event
     */
    public function getBetfairEvent()
    {
        return new Event($this->betfairClient, $this->adapter, $this->container);
    }

    public function getBetfairMarketCatalogue()
    {
        return new MarketCatalogue($this->betfairClient, $this->adapter, $this->container);
    }

    public function getBetfairMarketBook()
    {
        return new MarketBook($this->betfairClient, $this->adapter, $this->container);
    }

    public function getBetfairCountry()
    {
       return new Country($this->betfairClient, $this->adapter, $this->container);
    }

    public function getBetfairCompetition()
    {
        return new Competition($this->betfairClient, $this->adapter, $this->container);
    }

    public function getBetfairTimeRange()
    {
        return new TimeRange($this->betfairClient, $this->adapter, $this->container);
    }

    public function getContainer()
    {
        return $this->container;
    }
}
