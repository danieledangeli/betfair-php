<?php

namespace Betfair\Adapter;


class JsonRpcAdapter implements AdapterInterface
{
    public function adaptResponse($response)
    {
        $data = json_decode($response, true);
        $result = json_encode($data[0]['result']);
        return $result;
    }
}