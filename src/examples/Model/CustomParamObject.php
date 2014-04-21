<?php
namespace examples\Model;

use Betfair\Model\ParamInterface;
use \Betfair\Model\BetfairSerializable;

class CustomParamObject extends BetfairSerializable implements ParamInterface, \JsonSerializable
{

    protected $marketFilter;

    public function __construct($marketFilter)
    {
        $this->marketFilter = $marketFilter;
    }
    public function getFilter()
    {
        // TODO: Implement getFilter() method.
    }

    public function getMaxResults()
    {
        // TODO: Implement getMaxResults() method.
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
}