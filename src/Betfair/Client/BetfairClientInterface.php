<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\Client;

interface BetfairClientInterface
{
    public function sportsApiNgRequest($operation, $params, $endPointUrl);
    public function login();

} 