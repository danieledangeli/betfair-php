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

/**
 * The object of this class are generic jsonRPC 1.0 clients
 * http://json-rpc.org/wiki/specification
 *
 * @author sergio <jsonrpcphp@inservibile.org>
 */
class JsonRPCClient {

    /**
     * Debug state
     *
     * @var boolean
     */
    private $debug;

    /**
     * The server URL
     *
     * @var string
     */
    private $url;
    /**
     * The request id
     *
     * @var integer
     */
    private $id;
    /**
     * If true, notifications are performed instead of requests
     *
     * @var boolean
     */
    private $notification = false;


    /**
     * @param $url
     * @param bool $debug
     */
    public function __construct($url, $debug = false) {
        // server URL
        $this->url = $url;
        // proxy
        empty($proxy) ? $this->proxy = '' : $this->proxy = $proxy;
        // debug state
        empty($debug) ? $this->debug = false : $this->debug = true;

        // message id
        $this->id = 1;
    }

    /**
     * Sets the notification state of the object. In this state, notifications are performed, instead of requests.
     *
     * @param boolean $notification
     */
    public function setRPCNotification($notification) {
        empty($notification) ?
            $this->notification = false
            :
            $this->notification = true;
    }

    /**
     * @param $method
     * @param $header
     * @param $params
     * @return bool
     * @throws Exception
     */
    public function __call($method, $params) {



        // check
        if (!is_scalar($method)) {
            throw new Exception('Method name has no scalar value');
        }

        // check
        if (is_array($params)) {
            // no keys
            $params = array_values($params);
        } else {
            throw new Exception('Params must be given as array');
        }

        // sets notification or request task
        if ($this->notification) {
            $currentId = NULL;
        } else {
            $currentId = $this->id;
        }

        // prepares the request
        $request = array(
            'method' => $method,
            'params' => $params[0],
            'id' => $currentId
        );
        $request = json_encode($request);
        echo $request;
        $this->debug && $this->debug.='***** Request *****'."\n".$request."\n".'***** End Of request *****'."\n\n";

        // performs the HTTP POST
        $opts = array ('http' => array (
            'method'  => 'POST',
            'header'  => $params[1],
            'content' => $request
        ));
        $context  = stream_context_create($opts);
        if ($fp = fopen($this->url, 'r', false, $context)) {
            $response = '';
            while($row = fgets($fp)) {
                $response.= trim($row)."\n";
            }
            $this->debug && $this->debug.='***** Server response *****'."\n".$response.'***** End of server response *****'."\n";
            $response = json_decode($response,true);
        } else {
            throw new \Exception('Unable to connect to '.$this->url);
        }

        // debug output
        if ($this->debug) {
            echo nl2br($debug);
        }

        // final checks and return
        if (!$this->notification) {
            // check
            if ($response['id'] != $currentId) {
                throw new Exception('Incorrect response id (request id: '.$currentId.', response id: '.$response['id'].')');
            }
            if (!is_null($response['error'])) {
                echo var_dump($response['error']);
               // throw new \RuntimeException('Request error: '.$response['error']);
            }

            return $response['result'];

        } else {
            return true;
        }
    }

    function sportsApingRequest($appKey, $sessionToken, $operation, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.betfair.com/exchange/betting/json-rpc/v1");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Application: ' . $appKey,
            'X-Authentication: ' . $sessionToken,
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
            echo 'Call to api-ng failed: ' . "\n";
            echo  'Response: ' . json_encode($response);
            exit(-1);
        } else {
            return $response;
        }

    }
}
?>
