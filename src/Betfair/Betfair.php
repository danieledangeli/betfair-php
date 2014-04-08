<?php

/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair;

use Betfair\Adapter\AdapterInterface;
use Betfair\Adapter\ArrayAdapter;
use Betfair\Event\EventType;

class Betfair
{
    /**
     * Version.
     * @see http://semver.org/
     */
    const VERSION = '1.0.0-dev';


    /**
     * The credentials instance to use.
     *
     * @var Credentials
     */
    protected $credentials;

    /**
     * The adapter to use.
     *
     * @var AdapterInterface
     */
    protected $adapter;


    public function __construct(Credentials $credentials, AdapterInterface $adapter = null, JsonRpcClient $client)
    {
        $this->credentials = $credentials;
        $this->setAdapter($adapter);
    }

    public function setAdapter($adapter = null)
    {
        $this->adapter = $adapter ?: new ArrayAdapter();
    }

    public function eventType()
    {
        return new EventType($this->credentials, null, null);
    }


}