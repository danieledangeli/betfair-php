<?php

namespace Betfair\Client;

use Betfair\CredentialInterface;

class BetfairClient
{

    protected $credential;

    public function __construct(CredentialInterface $credential)
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
