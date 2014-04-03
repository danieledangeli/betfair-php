<?php

namespace Betfair\Adapter;


interface AdapterInterface
{
    /**
     * @param $response
     * @return adapted response ( json rpc format )
     */
    public function adaptResponse($response);

} 