betfair-php
===========

This PHP 5.4+ library helps you to interact with the Betfair API via PHP.

Installation
------------

This library can be found on [Packagist](https://packagist.org/packages).
The recommended way to install this is through [composer](http://getcomposer.org).

Run these commands to install composer, the library and its dependencies:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar require erlangb/betfair-php:@stable
```

Or edit `composer.json` and add:

```json
{
    "require": {
        "erlangb/betfair": "@dev-master"
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
------------
To use this library you must obtain an APP_KEY from [Betfair](https://developer.betfair.com/)

The first step is setting up the library and obtain **Betfair** object.
The **Betfair** object take in input a *BetfairClient*, *BetfairContainer* and an *Adapter*. 
Later is explained how to customize the library and why we need to build ( apparentely ) so much objects.

```php
<?php
require 'vendor/autoload.php';
use Betfair\Credential;
use Betfair\Dependency\BetfairContainer;
use Betfair\Betfair;
use Betfair\Client\BetfairClient;
use Betfair\Client\JsonRpcClient;
use Betfair\Adapter\ArrayAdapter;

$credential = new Credential("APP_KEY", "BETFAIR_USERNAME", 'BETFAIR_PWD');
$container = new BetfairContainer();
$betfairClient = new BetfairClient($credential, new JsonRpcClient());

$betfair = new Betfair($betfairClient, $container, new ArrayAdapter());
```
With the **Betfair** object you can access to the API model to execute some query.
For example, considering the Betfair __EventType__ API, you can access to the relative object model by typing:
```php
$betfairEventType = $betfair->getBetfairEventType()
```
Now we have an helper to access to EventTy
