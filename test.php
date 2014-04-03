<?php

require_once __DIR__ ."/autoload.php";

$credential = new \Betfair\Credentials("PuJtD2nA9b8IQEkI", "S28x1R7RSiPFF59s8t3WkRRSu70WI4EgeGvjLxWvS04=");
$jsonRpcClient = new \Betfair\JsonRPCClient(\Betfair\AbstractBetfair::END_POINT_URL, false);

/*$eventType = new \Betfair\Event\EventType($credential, $jsonRpcClient, new \Betfair\Adapter\ArrayRpcAdapter());
$eventBetfair = new \Betfair\MarketCatalogue\MarketCatalogue($credential, $jsonRpcClient, new \Betfair\Adapter\ArrayRpcAdapter());
$eventTypes = $eventType->getAllEventType();

$result = $eventBetfair->listMarketCatalogue();
foreach($eventTypes as $eventType) {
  //$events = $eventBetfair->getAllEventFilteredByEventTypeIds(array($eventType['eventType']['id']));
  //echo count($events) . $eventType['eventType']['name']. "\n";
}*/

$eventBetfair = new \Betfair\MarketCatalogue\MarketCatalogue($credential, $jsonRpcClient, new \Betfair\Adapter\ArrayAdapter());
$filter = new \Betfair\Model\MarketFilter();
$filter->setEventTypeIds(array(1));
$timeRange = new \Betfair\Model\TimeRange();
$timeRange->setTo(new \DateTime('2014-02-04'));
$timeRange->setFrom(new \DateTime('2014-04-04'));
$filter->setMarketStartTime($timeRange);
$param = new \Betfair\Model\Param($filter);
$param->setMaxResults(40);
$eventBetfair->executeCustomQuery($param);
