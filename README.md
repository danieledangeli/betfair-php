betfair-php
===========
[![Latest Stable Version](https://poser.pugx.org/erlangb/betfair/v/stable.png)](https://packagist.org/packages/erlangb/betfair)
[![Total Downloads](https://poser.pugx.org/erlangb/betfair/downloads.png)](https://packagist.org/packages/erlangb/betfair)
[![Latest Unstable Version](https://poser.pugx.org/erlangb/betfair/v/unstable.png)](https://packagist.org/packages/erlangb/betfair)
[![License](https://poser.pugx.org/erlangb/betfair/license.png)](https://packagist.org/packages/erlangb/betfair)
[![Monthly Downloads](https://poser.pugx.org/erlangb/betfair/d/monthly.png)](https://packagist.org/packages/erlangb/betfair)
[![Daily Downloads](https://poser.pugx.org/erlangb/betfair/d/daily.png)](https://packagist.org/packages/erlangb/betfair)

This PHP 5.4+ library helps you to interact with the Betfair API via PHP.
Menù
------------
* [Main](README.md)
* [The big view](BIGVIEW.md)
* [How to personalize the library](PERSONALIZE.md)
* [How to contribute](CONTRIBUTE.md)

Installation
===========

This library can be found on [Packagist](https://packagist.org/packages).
The recommended way to install this is through [composer](http://getcomposer.org).

Run these commands to install composer, the library and its dependencies:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar require erlangb/betfair-php:dev-master
```

Or edit `composer.json` and add:

```json
{
    "require": {
        "erlangb/betfair": "dev-master"
    }
}
```

**Protip:** you should browse the
[`erlangb/betfair`](https://packagist.org/packages/erlangb/betfair)
page to choose a stable version to use, instead of dev-master

And install dependencies:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install
```

Now you can add the autoloader, and you will have access to the library:

```php
<?php

require 'vendor/autoload.php';
```

If you don't use neither **Composer** nor a _ClassLoader_ in your application, just require the provided autoloader:

```php
<?php

require_once 'src/autoload.php';
```

Usage
======

Obtain an APP_KEY
------------
To use this library you have to obtain an APP_KEY from [Betfair](https://developer.betfair.com/)

The simple usage
------------
**Protip:**  With the __simple usage__ you can have access to the already existing helpers. Please feel free to contribute to this library by adding more helpers.

The first step is setting up the library and obtain the **Betfair** object.
The **Betfair** object has to built up with a *BetfairClient*, *BetfairContainer* and an *Adapter*.

We need to build these objects for the library to be customizable, if needed.
In the __how to customize__ section you will be explained how to do it.

```php
<?php
require 'vendor/autoload.php';
use Betfair\Credential;
use Betfair\Betfair;
use Betfair\Client\BetfairClient;
use Betfair\Client\JsonRpcClient;
use Betfair\Adapter\ArrayAdapter;

$credential = new Credential("APP_KEY", "BETFAIR_USERNAME", 'BETFAIR_PWD');
$betfairClient = new BetfairClient($credential, new JsonRpcClient());
$betfair = new Betfair($betfairClient, new ArrayAdapter());
```
With the **Betfair** object you can access to the API model to execute some query.
For example, considering the Betfair __Event__ API, you can access to the relative object model by typing:
```php
$betfairEvent = $betfair->getBetfairEvent();
```
Following an helper to access the list of events API by typing:
```php
$result = $betfairEvent->getAllEventFilteredByEventTypeIds(array(1));
```
The result object  is a list of betfair events with event type = 1 (Soccer)

The following object are available:
*   Competition: get betfair competition list
*   Country: get the betfair country list
*   Event: query the betfair events
*   EventType: obtain the betfair's event type
*   MarketBook: query the betfair market
*   Market Catalogue: query the betfair market catalogue
*   Time range: query teh betfair time range

How to contribute
===========

I'm very glad to be helped to maintain and extend this library. 
Please read the [how to personalize the library](PERSONALIZE.md) section in order to understand how the library is built and how contribute on it

Reporting Issues
------------

We would love to hear your feedback. Report issues using the [Github
Issue Tracker](https://github.com/danieledangeli/betfair-php/issues) or email me at
[dangeli88.daniele@gmail.com](mailto:dangeli88.daniele@gmail.com).


Todo
===========
The library is actually "in dev" state and a lot of things to be done. 
*   Enabling guzzle library
*   Implements more "Betfair object" to extend the API wrapping
*   Add more PHPspec test
*   PHPspec test refactoring
*   Guzzle client side caching system
