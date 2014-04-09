<?php
/*
                    COPYRIGHT

Copyright 2007 Sergio Vaccaro <sergio@inservibile.org>

This file is part of JSON-RPC PHP.

JSON-RPC PHP is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

JSON-RPC PHP is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with JSON-RPC PHP; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

namespace Betfair;
use Betfair\Exception\BetfairRequestException;

/**
 * The object of this class are generic jsonRPC 1.0 clients
 * http://json-rpc.org/wiki/specification
 *
 * @author sergio <jsonrpcphp@inservibile.org>
 */
class JsonRpcClient implements BetfairJsonRpcClientInterface
{

    function sportsApiNgRequest(CredentialInterface $credential, $operation, $params, $endPointUrl)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endPointUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Application: ' . $credential->getApplicationKey(),
            'X-Authentication: ' . $credential->getSessionToken(),
            'Accept: application/json',
            'Content-Type: application/json'
        ));
        $postData =
            '[{ "jsonrpc": "2.0", "method": "SportsAPING/v1.0/' . $operation . '", "params" :' . $params . ', "id": 1}]';

        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        //debug('Post Data: ' . $postData);
        $response = curl_exec($ch);
        curl_close($ch);
        if (isset($response[0]->error)) {
          throw new BetfairRequestException($response[0]->error);
        } else {
            return $response;
        }
    }
}
?>
