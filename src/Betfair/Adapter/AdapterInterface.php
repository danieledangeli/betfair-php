<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\Adapter;


interface AdapterInterface
{
    /**
     * @param $response
     * @return adapted response ( json rpc format )
     */
    public function adaptResponse($response);

} 