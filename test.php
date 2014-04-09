<?php

require_once __DIR__ . "/src/autoload.php";

ob_start();
$sessionToken = getACookie();
ob_end_clean();
$credential = new \Betfair\Credentials("PuJtD2nA9b8IQEkI", $sessionToken);
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

$param = new \Betfair\Model\Param($filter);
$param->setMaxResults(40);
$return = $eventBetfair->executeCustomQuery($param);
$result = $return;


function getACookie(){

    $loginEndpoint= "https://identitysso.betfair.com/api/login";

    $cookie = "";

    $username = "erlangb88";
    $password = "annarita05011988";


    $login = "true";
    $redirectmethod = "POST";
    $product = "home.betfair.int";
    $url = "https://www.betfair.com/";

    $fields = array
    (
        'username' => urlencode($username),
        'password' => urlencode($password),
        'login' => urlencode($login),
        'redirectmethod' => urlencode($redirectmethod),
        'product' => urlencode($product),
        'url' => urlencode($url)
    );

    //open connection
    $ch = curl_init($loginEndpoint);
    //url-ify the data for the POST
    $counter = 0;
    $fields_string = "&";

    foreach($fields as $key=>$value)
    {
        if ($counter > 0)
        {
            $fields_string .= '&';
        }
        $fields_string .= $key.'='.$value;
        $counter++;
    }

    rtrim($fields_string,'&');

    curl_setopt($ch, CURLOPT_URL, $loginEndpoint);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
    curl_setopt($ch, CURLOPT_HEADER, true);  // DO  RETURN HTTP HEADERS
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // DO RETURN THE CONTENTS OF THE CALL

    //execute post

    $result = curl_exec($ch);


    echo $result;

    if($result == false)
    {
        echo 'Curl error: ' . curl_error($ch);
    }

    else
    {
        $temp = explode(";", $result);
        $result = $temp[0];

        $end = strlen($result);
        $start = strpos($result, 'ssoid=');
        $start = $start + 6;

        $cookie = substr($result, $start, $end);

    }
    curl_close($ch);

    return $cookie;
}
