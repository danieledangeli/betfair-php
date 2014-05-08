<?php
/**
 * Created by PhpStorm.
 * User: danieledangeli
 * Date: 5/5/14
 * Time: 5:04 AM
 */

namespace Betfair\Model;


class ParamMarketBook extends  BetfairSerializable
{
    /** @var  array */
    protected $marketIds;

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

} 