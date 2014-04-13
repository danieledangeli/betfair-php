<?php

namespace Betfair\Model;


class MarketFilter extends BetfairSerializable implements MarketFilterInterface
{
    /**
     * @var string
     */
    public $textQuery;

    /**
     * @var array
     */
    public $exchangeIds;

    /**
     * @var array
     */
    public $eventTypeIds;

    /**
     * @var array
     */
    public $eventIds;

    /**
     * @var array
     */
    public $competitionIds;

    /**
     * @var array
     */
    public $marketIds;

    /**
     * @var array
     */
    public $venues;

    /**
     * @var boolean
     */
    public $bspOnly;

    /**
     * @var boolean
     */
    public $turnInPlayEnabled;

    /**
     * @var boolean
     */
    public $inPlayOnly;

    /**
     * @var array
     */
    public $marketBettingTypes;

    /**
     * @var array
     */
    public $marketCountries;

    /**
     * @var array
     */
    public $marketTypeCodes;

    /**
     * @var TimeRange
     */
    public $marketStartTime;

    /**
     * @var array OrderStatus
     */
    public $withOrders;

    /**
     * @param boolean $bspOnly
     */
    public function setBspOnly($bspOnly)
    {
        $this->bspOnly = $bspOnly;
    }

    /**
     * @return boolean
     */
    public function getBspOnly()
    {
        return $this->bspOnly;
    }

    /**
     * @param array $competitionIds
     */
    public function setCompetitionIds($competitionIds)
    {
        $this->competitionIds = $competitionIds;
    }

    /**
     * @return array
     */
    public function getCompetitionIds()
    {
        return $this->competitionIds;
    }

    /**
     * @param array $eventIds
     */
    public function setEventIds($eventIds)
    {
        $this->eventIds = $eventIds;
    }

    /**
     * @return array
     */
    public function getEventIds()
    {
        return $this->eventIds;
    }

    /**
     * @param array $eventTypeIds
     */
    public function setEventTypeIds($eventTypeIds)
    {
        $this->eventTypeIds = $eventTypeIds;
    }

    /**
     * @return array
     */
    public function getEventTypeIds()
    {
        return $this->eventTypeIds;
    }

    /**
     * @param array $exchangeIds
     */
    public function setExchangeIds($exchangeIds)
    {
        $this->exchangeIds = $exchangeIds;
    }

    /**
     * @return array
     */
    public function getExchangeIds()
    {
        return $this->exchangeIds;
    }

    /**
     * @param boolean $inPlayOnly
     */
    public function setInPlayOnly($inPlayOnly)
    {
        $this->inPlayOnly = $inPlayOnly;
    }

    /**
     * @return boolean
     */
    public function getInPlayOnly()
    {
        return $this->inPlayOnly;
    }

    /**
     * @param array $marketBettingTypes
     */
    public function setMarketBettingTypes($marketBettingTypes)
    {
        $this->marketBettingTypes = $marketBettingTypes;
    }

    /**
     * @return array
     */
    public function getMarketBettingTypes()
    {
        return $this->marketBettingTypes;
    }

    /**
     * @param array $marketCountries
     */
    public function setMarketCountries($marketCountries)
    {
        $this->marketCountries = $marketCountries;
    }

    /**
     * @return array
     */
    public function getMarketCountries()
    {
        return $this->marketCountries;
    }

    /**
     * @param array $marketIds
     */
    public function setMarketIds($marketIds)
    {
        $this->marketIds = $marketIds;
    }

    /**
     * @return array
     */
    public function getMarketIds()
    {
        return $this->marketIds;
    }

    /**
     * @param \Betfair\Model\TimeRange $marketStartTime
     */
    public function setMarketStartTime($marketStartTime)
    {
        $this->marketStartTime = $marketStartTime;
    }

    /**
     * @return \Betfair\Model\TimeRange
     */
    public function getMarketStartTime()
    {
        return $this->marketStartTime;
    }

    /**
     * @param array $marketTypeCodes
     */
    public function setMarketTypeCodes($marketTypeCodes)
    {
        $this->marketTypeCodes = $marketTypeCodes;
    }

    /**
     * @return array
     */
    public function getMarketTypeCodes()
    {
        return $this->marketTypeCodes;
    }

    /**
     * @param string $textQuery
     */
    public function setTextQuery($textQuery)
    {
        $this->textQuery = $textQuery;
    }

    /**
     * @return string
     */
    public function getTextQuery()
    {
        return $this->textQuery;
    }

    /**
     * @param boolean $turnInPlayEnabled
     */
    public function setTurnInPlayEnabled($turnInPlayEnabled)
    {
        $this->turnInPlayEnabled = $turnInPlayEnabled;
    }

    /**
     * @return boolean
     */
    public function getTurnInPlayEnabled()
    {
        return $this->turnInPlayEnabled;
    }

    /**
     * @param array $venues
     */
    public function setVenues($venues)
    {
        $this->venues = $venues;
    }

    /**
     * @return array
     */
    public function getVenues()
    {
        return $this->venues;
    }

    /**
     * @param array $withOrders
     */
    public function setWithOrders($withOrders)
    {
        $this->withOrders = $withOrders;
    }

    /**
     * @return array
     */
    public function getWithOrders()
    {
        return $this->withOrders;
    }


}