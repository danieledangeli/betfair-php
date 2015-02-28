<?php

use Betfair\BetfairFactory;
use Betfair\Model\BetStatus;
use Betfair\Model\MarketFilter;

require '../vendor/autoload.php';

$soccerEvents = searchClearedOrder('app_key', 'user', 'pass');

$a = $soccerEvents;

function searchClearedOrder($appKey, $username, $pwd)
{
    $betfair = BetfairFactory::createBetfair(
        $appKey,
        $username,
        $pwd
    );

    $clearedOrder = $betfair->getBetfairClearedOrder();

    $param = $clearedOrder->createParam();
    $param->setBetStatus(BetStatus::SETTLED);

    $clearedOrder->withParam($param);

    $results = $clearedOrder->getResults();

    return $results;
}
