<?php

namespace Betfair\Model;


interface MarketFilterInterface
{
    /**
     * @return array
     */
    public function getCompetitionIds();

    /**
     * @return array
     */
    public function getEventIds();


    /**
     * @return array
     */
    public function getEventTypeIds();

    /**
     * @return array
     */
    public function getExchangeIds();

    /**
     * @return boolean
     */
    public function getInPlayOnly();

    /**
     * @return array
     */
    public function getMarketBettingTypes();

    /**
     * @return array
     */
    public function getMarketCountries();

    /**
     * @return array
     */
    public function getMarketIds();

    /**
     * @return \Betfair\Model\TimeRange
     */
    public function getMarketStartTime();

    /**
     * @return array
     */
    public function getMarketTypeCodes();

    /**
     * @return string
     */
    public function getTextQuery();

    /**
     * @return boolean
     */
    public function getTurnInPlayEnabled();


    /**
     * @return array
     */
    public function getVenues();

    /**
     * @return array
     */
    public function getWithOrders();

} 