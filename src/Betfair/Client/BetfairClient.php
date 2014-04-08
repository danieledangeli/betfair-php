<?php

namespace Betfair\Client;

use Betfair\Credentials;

class BetfairClient
{

    protected $credential;

    public function __construct(Credentials $credential)
    {
        $this->credential = $credential;

    }

    public function getUsername()
    {
        return $this->credential->getUsername();
    }

    public function getPassword()
    {
       return $this->credential->getPassword();
    }
}
