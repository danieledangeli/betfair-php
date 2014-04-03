<?php

namespace Betfair\Adapter;


class Adapter implements AdapterInterface
{
    public function adaptResponse($response)
    {
        return $response;
    }
}