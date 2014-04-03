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

/**
 * Credentials class.
 *
 * @author Daniele D'Angeli <dangeli88.daniele@gmail.com>
 */
class Credentials
{
    /**
     * The application KEY.
     *
     * @var string
     */
    private $applicationKey;

    /**
     * The session token.
     *
     * @var string
     */
    private $sessionToken;


    /**
     * @param $applicationKey
     * @param $sessionToken
     */
    public function __construct($applicationKey, $sessionToken)
    {
        $this->applicationKey = $applicationKey;
        $this->sessionToken   = $sessionToken;
    }

    /**
     * @return string
     */
    public function getApplicationKey()
    {
        return $this->applicationKey;
    }

    /**
     * @return string
     */
    public function getSessionToken()
    {
        return $this->sessionToken;
    }
}