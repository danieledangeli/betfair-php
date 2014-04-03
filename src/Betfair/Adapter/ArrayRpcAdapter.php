<?php

namespace Betfair\Adapter;


class ArrayRpcAdapter implements AdapterInterface
{
    public function adaptResponse($response)
    {
        $data = json_decode($response, true);
        return $data[0]['result'];
    }

} 