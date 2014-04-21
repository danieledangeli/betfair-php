<?php
require '../autoload.php';
use examples\MyFactory\MyMarketFilterFactory;
use Betfair\Client\JsonRpcClient;
use examples\Adapter\CustomAdapter;

$credential = new \Betfair\Credential("PuJtD2nA9b8IQEkI", "erlangb88", 'annarita05011988');
$container = new \Betfair\Dependency\BetfairContainer();
//betfair.market.filter.factory
//betfair.param.filter.factory

//define new custom function
$myFactoryFunction = function () {
    return new MyMarketFilterFactory();
};
//define new custom function
$myParamFactory = function () {
    return new \examples\MyFactory\MyParamFactory();
};
//setting new custom funtions to the container
$container->set('betfair.market.filter.factory', $myFactoryFunction);
$container->set('betfair.param.filter.factory', $myParamFactory);

$betfairClient = new \Betfair\Client\BetfairClient($credential, new JsonRpcClient());

$betfair = new \Betfair\Betfair($betfairClient, $container, new CustomAdapter());
$event = $betfair->getBetfairEvent();

$result = $event->getAllEventFilteredByEventTypeIds(array(1));
