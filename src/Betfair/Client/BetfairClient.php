<?php

namespace Betfair\Client;

use Betfair\CredentialInterface;
use Betfair\Exception\BetfairLoginException;

class BetfairClient
{
    const LOGIN_ENDPOINT = "https://identitysso.betfair.com/api/login";

    protected $credential;

    public function __construct(CredentialInterface $credential)
    {
        $this->credential = $credential;

    }

    public function getUsername()
    {
        return $this->credential->getUsername();
    }

    public function getPassword()
    {
       return $this->credential->getPassword();
    }

    public function login()
    {
        $login = "true";
        $redirectmethod = "POST";
        $product = "home.betfair.int";
        $url = "https://www.betfair.com/";

        $fields = array
        (
            'username'       => urlencode($this->getUsername()),
            'password'       => urlencode($this->getPassword()),
            'login'          => urlencode($login),
            'redirectmethod' => urlencode($redirectmethod),
            'product'        => urlencode($product),
            'url'            => urlencode($url)
        );

        //open connection
        $ch = curl_init(self::LOGIN_ENDPOINT);
        //url-ify the data for the POST
        $counter = 0;
        $fields_string = "&";

        foreach($fields as $key=>$value)
        {
            if ($counter > 0)
            {
                $fields_string .= '&';
            }
            $fields_string .= $key.'='.$value;
            $counter++;
        }

        rtrim($fields_string,'&');

        curl_setopt($ch, CURLOPT_URL, self::LOGIN_ENDPOINT);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
        curl_setopt($ch, CURLOPT_HEADER, true);  // DO  RETURN HTTP HEADERS
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // DO RETURN THE CONTENTS OF THE CALL

        //execute post

        $result = curl_exec($ch);

        if($result == false) {
           throw new BetfairLoginException;
        } else {
            $temp = explode(";", $result);
            $result = $temp[0];

            $end = strlen($result);
            $start = strpos($result, 'ssoid=');
            $start = $start + 6;
            $cookie = substr($result, $start, $end);

        }
        curl_close($ch);

        $this->credential->setSessionToken($cookie);

        return $cookie;
    }
}
