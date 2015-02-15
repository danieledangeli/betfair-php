<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\Model;

interface MarketFilterInterface
{
    /**
     * @param $competitionIds
     * @return mixed
     */
    public function setCompetitionIds($competitionIds);

    /**
     * @return array
     */
    public function getCompetitionIds();

    /**
     * @param $eventIds
     * @return mixed
     */
    public function setEventIds($eventIds);

    /**
     * @return array
     */
    public function getEventIds();

    /**
     * @param $eventTypeIds
     * @return mixed
     */
    public function setEventTypeIds($eventTypeIds);

    /**
     * @return array
     */
    public function getEventTypeIds();

    /**
     * @param $exchangeIds
     * @return mixed
     */
    public function setExchangeIds($exchangeIds);
    /**
     * @return array
     */
    public function getExchangeIds();

    /**
     * @param $inPlayOnly
     * @return mixed
     */
    public function setInPlayOnly($inPlayOnly);
    /**
     * @return boolean
     */
    public function getInPlayOnly();

    /**
     * @param $marketBettingTypes
     * @return mixed
     */
    public function setMarketBettingTypes($marketBettingTypes);
    /**
     * @return array
     */
    public function getMarketBettingTypes();

    /**
     * @param $contries
     * @return mixed
     */
    public function setMarketCountries($contries);

    /**
     * @return array
     */
    public function getMarketCountries();

    /**
     * @param $marketIds
     * @return mixed
     */
    public function setMarketIds($marketIds);
    /**
     * @return array
     */
    public function getMarketIds();

    /**
     * @param $marketStartTime
     * @return mixed
     */
    public function setMarketStartTime($marketStartTime);

    /**
     * @return \Betfair\Model\TimeRange
     */
    public function getMarketStartTime();

    /**
     * @param $marketTypeCodes
     * @return mixed
     */
    public function setMarketTypeCodes($marketTypeCodes);

    /**
     * @return array
     */
    public function getMarketTypeCodes();

    /**
     * @param $textQuery
     * @return mixed
     */
    public function setTextQuery($textQuery);

    /**
     * @return string
     */
    public function getTextQuery();

    /**
     * @param $inPlay
     * @return mixed
     */
    public function setTurnInPlayEnabled($inPlay);

    /**
     * @return boolean
     */
    public function getTurnInPlayEnabled();

    /**
     * @param $venues
     * @return mixed
     */
    public function setVenues($venues);

    /**
     * @return array
     */
    public function getVenues();

    /**
     * @param $withOrders
     * @return mixed
     */
    public function setWithOrders($withOrders);
    /**
     * @return array
     */
    public function getWithOrders();
}
