<?php

namespace Betfair\Model;

class ParamMarketBook extends BetfairSerializable implements ParamInterface
{
    /** @var  array */
    protected $marketIds;

    protected $priceProjection;

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

    public function addPriceProjection($priceProjection)
    {
        $this->priceProjection[] = $priceProjection;
    }

    /**
     * @param mixed $priceProjection
     */
    public function setPriceProjection($priceProjection)
    {
        $this->priceProjection = $priceProjection;
    }

    /**
     * @return mixed
     */
    public function getPriceProjection()
    {
        return $this->priceProjection;
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
            if(null !== $value) {
                if($key == 'priceProjection') {
                    $priceProjections = new \stdClass;
                    $priceProjections->priceData = $value;
                    $array[$key] = $priceProjections;
                } else {
                    $array[$key] = $value;
                }
            }

        }

        return $array;
    }

    /**
     * @param array $marketProjection
     */
    public function setMarketProjection($marketProjection)
    {
        // TODO: Implement setMarketProjection() method.
    }

    public function setMaxResults($maxResult)
    {
        // TODO: Implement setMaxResult() method.
    }
}