<?php

namespace Betfair\Client;


interface BetfairClientInterface
{
    public function sportsApiNgRequest($operation, $params, $endPointUrl);
    public function login();

} 