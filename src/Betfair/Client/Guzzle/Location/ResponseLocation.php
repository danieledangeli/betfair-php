<?php
namespace Betfair\Client\Guzzle\Location;

use GuzzleHttp\Command\Guzzle\ResponseLocation\AbstractLocation;
use GuzzleHttp\Command\Guzzle\ResponseLocation\ResponseLocationInterface;

/**
 * Class ResponseLocation
 * Return the entire Response Object
 * @package Betfair\Client\Guzzle\Location
 */
class ResponseLocation extends AbstractLocation implements ResponseLocationInterface
{
    public function __construct($locationName)
    {
        parent::__construct($locationName);
    }

    public function visit(
        \GuzzleHttp\Command\CommandInterface $command,
        \GuzzleHttp\Message\ResponseInterface $response,
        \GuzzleHttp\Command\Guzzle\Parameter $param,
        &$result,
        array $context = []
    )
    {

        $result = $response;
    }
}