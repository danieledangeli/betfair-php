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

The Param and Market Filter objects are serialized in order to build the JSON POST data to the Betfair API.
If you need to change some aspects of that, you can write your classes and customize the behaviour of BetfairContainer.



