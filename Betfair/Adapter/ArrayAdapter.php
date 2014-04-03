<?php

namespace Betfair\Adapter;


class ArrayAdapter implements AdapterInterface
{
    public function adaptResponse($response)
    {
       $data = json_decode($response, true);
       return $data;
    }
}