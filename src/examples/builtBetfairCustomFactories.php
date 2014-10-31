<?php
require '../autoload.php';
use Betfair\Betfair;
use Betfair\Client\BetfairClient;
use Betfair\Credential;
use examples\MyFactory\MyMarketFilterFactory;
use Betfair\Client\JsonRpcClient;
use examples\Adapter\CustomAdapter;

$credential = new Credential("app_key", "username", 'password');
$betfairClient = new BetfairClient($credential, new JsonRpcClient());

$betfair = new Betfair($betfairClient, new CustomAdapter());
$event = $betfair->getBetfairEvent();
$result = $event->getAllEventFilteredByEventTypeIds(array(1));
