<?php
namespace examples\Model;

use Betfair\Model\BetfairSerializable;
use Betfair\Model\MarketFilterInterface;

class CustomMarketFilterObject extends BetfairSerializable implements MarketFilterInterface, \JsonSerializable
{

    /**
     * @return array
     */
    public function getCompetitionIds()
    {
        // TODO: Implement getCompetitionIds() method.
    }

    /**
     * @return array
     */
    public function getEventIds()
    {
        // TODO: Implement getEventIds() method.
    }

    /**
     * @return array
     */
    public function getEventTypeIds()
    {
        // TODO: Implement getEventTypeIds() method.
    }

    /**
     * @return array
     */
    public function getExchangeIds()
    {
        // TODO: Implement getExchangeIds() method.
    }

    /**
     * @return boolean
     */
    public function getInPlayOnly()
    {
        // TODO: Implement getInPlayOnly() method.
    }

    /**
     * @return array
     */
    public function getMarketBettingTypes()
    {
        // TODO: Implement getMarketBettingTypes() method.
    }

    /**
     * @return array
     */
    public function getMarketCountries()
    {
        // TODO: Implement getMarketCountries() method.
    }

    /**
     * @return array
     */
    public function getMarketIds()
    {
        // TODO: Implement getMarketIds() method.
    }

    /**
     * @return \Betfair\Model\TimeRange
     */
    public function getMarketStartTime()
    {
        // TODO: Implement getMarketStartTime() method.
    }

    /**
     * @return array
     */
    public function getMarketTypeCodes()
    {
        // TODO: Implement getMarketTypeCodes() method.
    }

    /**
     * @return string
     */
    public function getTextQuery()
    {
        // TODO: Implement getTextQuery() method.
    }

    /**
     * @return boolean
     */
    public function getTurnInPlayEnabled()
    {
        // TODO: Implement getTurnInPlayEnabled() method.
    }

    /**
     * @return array
     */
    public function getVenues()
    {
        // TODO: Implement getVenues() method.
    }

    /**
     * @return array
     */
    public function getWithOrders()
    {
        // TODO: Implement getWithOrders() method.
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }

    /**
     * @param $competitionIds
     * @return mixed
     */
    public function setCompetitionIds($competitionIds)
    {
        // TODO: Implement setCompetitionIds() method.
    }

    /**
     * @param $eventIds
     * @return mixed
     */
    public function setEventIds($eventIds)
    {
        // TODO: Implement setEventIds() method.
    }

    /**
     * @param $eventTypeIds
     * @return mixed
     */
    public function setEventTypeIds($eventTypeIds)
    {
        // TODO: Implement setEventTypeIds() method.
    }

    /**
     * @param $exchangeIds
     * @return mixed
     */
    public function setExchangeIds($exchangeIds)
    {
        // TODO: Implement setExchangeIds() method.
    }

    /**
     * @param $inPlayOnly
     * @return mixed
     */
    public function setInPlayOnly($inPlayOnly)
    {
        // TODO: Implement setInPlayOnly() method.
    }

    /**
     * @param $marketBettingTypes
     * @return mixed
     */
    public function setMarketBettingTypes($marketBettingTypes)
    {
        // TODO: Implement setMarketBettingTypes() method.
    }

    /**
     * @param $contries
     * @return mixed
     */
    public function setMarketCountries($contries)
    {
        // TODO: Implement setMarketCountries() method.
    }

    /**
     * @param $marketIds
     * @return mixed
     */
    public function setMarketIds($marketIds)
    {
        // TODO: Implement setMarketIds() method.
    }

    /**
     * @param $marketStartTime
     * @return mixed
     */
    public function setMarketStartTime($marketStartTime)
    {
        // TODO: Implement setMarketStartTime() method.
    }

    /**
     * @param $marketTypeCodes
     * @return mixed
     */
    public function setMarketTypeCodes($marketTypeCodes)
    {
        // TODO: Implement setMarketTypeCodes() method.
    }

    /**
     * @param $textQuery
     * @return mixed
     */
    public function setTextQuery($textQuery)
    {
        // TODO: Implement setTextQuery() method.
    }

    /**
     * @param $inPlay
     * @return mixed
     */
    public function setTurnInPlayEnabled($inPlay)
    {
        // TODO: Implement setTurnInPlayEnabled() method.
    }

    /**
     * @param $venues
     * @return mixed
     */
    public function setVenues($venues)
    {
        // TODO: Implement setVenues() method.
    }

    /**
     * @param $withOrders
     * @return mixed
     */
    public function setWithOrders($withOrders)
    {
        // TODO: Implement setWithOrders() method.
    }
}