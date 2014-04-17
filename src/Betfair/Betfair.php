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
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\Competition\Competition;
use Betfair\Country\Country;
use Betfair\Event\Event;
use Betfair\Event\EventType;
use Betfair\MarketBook\MarketBook;
use Betfair\MarketCatalogue\MarketCatalogue;
use Betfair\Model\Param;
use Betfair\Model\ParamInterface;
use Betfair\Model\QueryManager;
use Betfair\TimeRange\TimeRange;

class Betfair
{
    /**
     * Version.
     * @see http://semver.org/
     */
    const VERSION = '1.0.0-dev';


    /**
     * The credentials instance to use.
     *
     * @var CredentialInterface
     */
    protected $credentials;

    /**
     * The adapter to use.
     *
     * @var AdapterInterface
     */
    protected $adapter;

    /** @var \Betfair\Client\BetfairJsonRpcClientInterface  */
    protected $betfairClient;

    /** @var \Betfair\BetfairGeneric  */
    protected $genericBetfair;



    public function __construct(
        BetfairJsonRpcClientInterface $client,
        AdapterInterface $adapter = null)
    {
        $this->betfairClient = $client;
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
        return new EventType($this->betfairClient, $this->adapter);
    }

    public function getBetfairGeneric()
    {
        return new BetfairGeneric($this->adapter)
    }
    /**
     * @return Event
     */
    public function getBetfairEvent()
    {
        return new Event($this->credentials, $this->betfairClient, $this->adapter);
    }

    public function getBetfairMarketCatalogue()
    {
        return new MarketCatalogue($this->credentials, $this->betfairClient, $this->adapter);
    }

    public function getBetfairMarketBook()
    {
        return new MarketBook($this->credentials, $this->betfairClient, $this->adapter);
    }

    public function getBetfairCountry()
    {
       return new Country($this->credentials, $this->betfairClient, $this->adapter);
    }

    public function getBetfairCompetition()
    {
        return new Competition($this->credentials, $this->betfairClient, $this->adapter);
    }

    public function getBetfairTimeRange()
    {
        return new TimeRange($this->credentials, $this->betfairClient, $this->adapter);
    }
}
