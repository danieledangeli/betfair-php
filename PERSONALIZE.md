Personalize PHP betfair library
============
To personalize the behaviour of the library you can use your object.

Personalize the ClientInterface and the AdapterInterface
------------
The **Betfair** object is constructed with a __BetfairClientInterface__, the container and the __AdapterInterface__.
```php
    public function __construct(
        BetfairClientInterface $client, 
        BetfairContainer $container, 
        AdapterInterface $adapter = null
    ) {
      ...
    }
```
This is the *BetfairClientInterface*:
```php
<?php

namespace Betfair\Client;


interface BetfairClientInterface
{
    public function sportsApiNgRequest($operation, $params, $endPointUrl);
    public function login();

} 
```

A class that implements the *BetfairClientInterface* is responsabile to execute the requests to the endpoint of BetfairApi and return a response. The login function must return the __sessionToken__ if needed by the other components that use the BetfairClientInterface. 
Is very simple to write your client if needed.

The __AdapterInterface__ is responsable to adpatee the jsonResponse in some customizable format.
This is the interface:
```php
<?php
namespace Betfair\Adapter;

interface AdapterInterface
{
    /**
     * @param $response
     * @return mixed response
     */
    public function adaptResponse($response);

} 
```

Given a response, an object that implements this interface must return an adapted data.
For example, there are already implemented Adapdter, and this one is the **ArrayRpcAdapter**, that given a json response, return an array of the results without the __RPC__ metadata:
```php
<?php
namespace Betfair\Adapter;

class ArrayRpcAdapter implements AdapterInterface
{
    public function adaptResponse($response)
    {
        $data = json_decode($response, true);
        return $data[0]['result'];
    }

} 
```

So, we can write own client and adapdter classes, by implementing the interface and adding own logic.

For example. this is an adpater that return a spl object from response:
```php
<?php
namespace examples\Adapter;

use Betfair\Adapter\AdapterInterface;

class CustomAdapter implements AdapterInterface
{

    /**
     * @param $response
     * @return mixed response
     */
    public function adaptResponse($response)
    {
        $data = json_decode($response, true);
        $data = $this->arrayToObject($data[0]['result']);
        return $data;
    }

    function arrayToObject($array) {
        if (!is_array($array)) {
            return $array;
        }

        $object = new \stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name=>$value) {
                $name = strtolower(trim($name));
                if (!empty($name)) {
                    $object->$name = $this->arrayToObject($value);
                }
            }
            return $object;
        }
        else {
            return FALSE;
        }
    }
}
```

You can use this adapter by built the **Betfair** object in this way:

```php
$betfair = new Betfair($betfairClient, $container, new \examples\Adapter\CustomAdapter());
```

Personalize the Param and the MarketFilter objects
----------

The __Param__ and __MarketFilter__ objects are serialized in order to build the JSON POST data to send at the Betfair API.
If you need to change some aspects of that, you can write your classes and customize the behaviour of the BetfairContainer.

First of all we need to customize the **Factory** classes by writing two simple classes, in this case they are **MyParamFactory** 

```php
<?php
namespace examples\Factory;

use \examples\Model\CustomParamObject;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Model\MarketFilterInterface;

class MyParamFactory  implements ParamFactoryInterface
{
    /**
     * @param \Betfair\Model\MarketFilterInterface $marketFilter
     * @return \Betfair\Model\ParamInterface|CustomParamObject
     */
    public function create(MarketFilterInterface $marketFilter)
    {
        return new CustomParamObject($marketFilter);
    }
}
```
and **MyMarketFilterFactory**

```php
<?php

namespace examples\Factory;

use  examples\Model\CustomMarketFilterObject;
use Betfair\Factory\MarketFilterFactoryInterface;

class MyMarketFilterFactory implements MarketFilterFactoryInterface
{

    /**
     * @return \Betfair\Model\MarketFilterInterface
     */
    public function create()
    {
        return new CustomMarketFilterObject();
    }
}

```
Note that the factory classes implements the respect **FactoryInterface**. In the __create()__ method will return two new custom object: **CustomMarketFilterObject** and **CustomParamObject**.
Let's go to show how this custom object are built.

```php
<?php
namespace examples\Model;

use Betfair\Model\ParamInterface;
use \Betfair\Model\BetfairSerializable;

class CustomParamObject extends BetfairSerializable implements ParamInterface, \JsonSerializable
{

    protected $marketFilter;

    public function __construct($marketFilter)
    {
        $this->marketFilter = $marketFilter;
    }
    public function getFilter()
    {
        // TODO: Implement getFilter() method.
    }

    public function getMaxResults()
    {
        // TODO: Implement getMaxResults() method.
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}
```
```php
<?php
namespace examples\Model;

use Betfair\Model\BetfairSerializable;
use Betfair\Model\MarketFilterInterface;

class CustomMarketFilterObject extends BetfairSerializable implements MarketFilterInterface, \JsonSerializable
{

    /**
     * @return array
     */
    public function getCompetitionIds()
    {
        // TODO: Implement getCompetitionIds() method.
    }

    /**
     * @return array
     */
    public function getEventIds()
    {
        // TODO: Implement getEventIds() method.
    }

    /**
     * @return array
     */
    public function getEventTypeIds()
    {
        // TODO: Implement getEventTypeIds() method.
    }

    /**
     * @return array
     */
    public function getExchangeIds()
    {
        // TODO: Implement getExchangeIds() method.
    }

    /**
     * @return boolean
     */
    public function getInPlayOnly()
    {
        // TODO: Implement getInPlayOnly() method.
    }

    /**
     * @return array
     */
    public function getMarketBettingTypes()
    {
        // TODO: Implement getMarketBettingTypes() method.
    }

    /**
     * @return array
     */
    public function getMarketCountries()
    {
        // TODO: Implement getMarketCountries() method.
    }

    /**
     * @return array
     */
    public function getMarketIds()
    {
        // TODO: Implement getMarketIds() method.
    }

    /**
     * @return \Betfair\Model\TimeRange
     */
    public function getMarketStartTime()
    {
        // TODO: Implement getMarketStartTime() method.
    }

    /**
     * @return array
     */
    public function getMarketTypeCodes()
    {
        // TODO: Implement getMarketTypeCodes() method.
    }

    /**
     * @return string
     */
    public function getTextQuery()
    {
        // TODO: Implement getTextQuery() method.
    }

    /**
     * @return boolean
     */
    public function getTurnInPlayEnabled()
    {
        // TODO: Implement getTurnInPlayEnabled() method.
    }

    /**
     * @return array
     */
    public function getVenues()
    {
        // TODO: Implement getVenues() method.
    }

    /**
     * @return array
     */
    public function getWithOrders()
    {
        // TODO: Implement getWithOrders() method.
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}
```

Note that both object must be __serialized__. The extend the BetfairSerializable object that implements a simple __jsonSerialize()__ method:

```php
/**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        $array = array();
        $properties = get_object_vars($this);
        foreach($properties as $key => $value) {
            if($value != NULL) {
                $array[$key] = $value;
            }
        }

        return $array;
    }
```
If you want you can redefine the __jsonSerialize()__ method in the new objects.

Now we can built a **Betfair** object with our new personalized classes.
```php
```
