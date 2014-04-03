<?php

namespace Betfair\Adapter;


interface AdapterInterface
{
    /**
     * @param $response
     * @return adapted response
     */
    public function adaptResponse($response);

} 