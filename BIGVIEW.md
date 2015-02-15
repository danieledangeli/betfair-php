Big view
============
In this section is explained how the library is designed. 
Please read this section if you want [contribute](CONTRIBUTE.md).

The library is designed in a really simple way. The core object is the **Betfair** object. 
The **betfair** objects has 2 association: 
*   BetfairClient (no need to personalize it in my opinion)
*   Adapter (could be useful add your custom adapter)

The __client__ object and the __adapter__ objects implements their interfaces (by following the Dependency Inversion Principle and allowing to [customize](PERSONALIZE.md) the library).

The Betfair is able to return an "helper object".
An helper object extends the **AbstracBetfair** and it has a set of methods to __query__ the Betfair endpoint API. 
For example, have a look at [betfair betting operations](https://api.developer.betfair.com/services/webapps/docs/display/1smk3cen4v3lu3yomq5qye0ni/Betting+API). There are a lot of operations that an user can use to query the betfair API endpoints. A 'helper' is the responsabile for a given operation. 

This is a list of Betfair operations:
*    listCompetitions
*    listCountries
*    listCurrentOrders
*    listClearedOrders
*    listEvents
*    listEventTypes
*    listMarketBook
*    listMarketCatalogue
*    listMarketProfitAndLoss
*    listMarketTypes
*    listTimeRanges
*    listVenues
*    placeOrders
*    cancelOrders
*    replaceOrders
*    updateOrders

Each of this operations as an 'helper' inside the library. That means that if we want to access to the 'listEvents' operation, we can use:
```php
$betfair->getEvent()
```
that return an __Event__ object. 

The event object has a list of method that helps the client to execute some query to retrieve the betfair events.

If you need a method that is not listed in the library you can simply use the method:

```php
$betfairEvent->executeCustomQuery(ParamInterface $param, $methodName);

The param interface is the body of the JsonRpc Betfair API.
Each param has a "MarketFilter" which one you are able to execute query on the betfair API.
To obtaint en empty Param Object just call:

$marketFilter = $betfairEvent->createMarketFilter();
$marketFilter-> ....
$param = $betfairEvent->createParamFilter($marketFilter);
$param ...

$betfairEvent->executeCustomQuery($param, "METHOD_NAME");
```

**Note:** not all the operatons are currently supported
The goal of this section is to explain the design of the
library in order to understand well how you can contribute
in it. 

OOP VIEW
--------

![OOP library](http://oi59.tinypic.com/2wlycde.jpg "OOP libary")

