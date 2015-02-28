<?php

namespace Betfair\Client;

class BetfairGuzzleClient
{

    private $guzzleClient;

    public function __construct($guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

    public function sportApiNgRequest(array $guzzleParameters)
    {
        $response = $this->guzzleClient->sportApiNgRequest(
            $guzzleParameters
        );

        return $response;
    }

    public function betfairLogin(array $guzzleParameters)
    {
        $response = $this->guzzleClient->betfairLogin(
            $guzzleParameters
        );

        return $response;
    }
}
