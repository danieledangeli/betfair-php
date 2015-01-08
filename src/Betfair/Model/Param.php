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

class Param extends BetfairSerializable implements ParamInterface
{
    /**
     * @param MarketFilterInterface $filter
     */
    public function __construct(MarketFilterInterface $filter)
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
     * @var array
     */
    protected $marketProjection;

    /**
     * @param array $marketProjection
     */
    public function setMarketProjection($marketProjection)
    {
        $this->marketProjection = $marketProjection;
    }

    public function addMarketProjection($marketProjection)
    {
        $this->marketProjection[] = $marketProjection;
    }

    /**
     * @return array
     */
    public function getMarketProjection()
    {
        return $this->marketProjection;
    }


    /**
     * @param MarketFilterInterface $filter
     */
    public function setFilter(MarketFilterInterface $filter)
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
     * @param $maxResults
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

}