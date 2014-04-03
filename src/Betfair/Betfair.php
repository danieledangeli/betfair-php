<?php

namespace Betfair;

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
     * @var HttpAdapterInterface
     */
    protected $adapter;


} 