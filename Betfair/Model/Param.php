<?php

namespace Betfair\Model;


class Param implements \JsonSerializable
{
    /**
     * @param MarketFilter $filter
     */
    public function __construct(MarketFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @var MarketFilter
     */
    protected $filter;

    /**
     * @var int
     */
    protected $maxResults;


    /**
     * @param MarketFilter $filter
     */
    public function setFilter(MarketFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return MarketFilter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param int $maxResult
     */
    public function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;
    }

    /**
     * @return int
     */
    public function getMaxResults()
    {
        return $this->maxResults;
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
        $array = array();
        $properties = get_object_vars($this);
        foreach($properties as $key => $value) {
            if($value != NULL) {
                $array[$key] = $value;
            }
        }

        return $array;
    }
}