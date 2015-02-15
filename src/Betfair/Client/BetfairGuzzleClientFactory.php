<?php

namespace Betfair\Client;


use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use Betfair\Client\Guzzle\Location\ResponseLocation;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

class BetfairGuzzleClientFactory
{
    private $specificationDir;

    public function __construct($specificationDir)
    {
        $this->specificationDir = $specificationDir;
    }

    public function createBetfairGuzzleClient()
    {
        $httpClient = new Client();

        $description = new Description(
            $this->getConfigDescriptionArrayFromSpecificationDir($this->specificationDir)
        );

        $guzzleClient = new GuzzleClient($httpClient, $description, [
            'response_locations' => ['response' => new ResponseLocation('response')], //custom json location
        ]);

        return new BetfairGuzzleClient($guzzleClient);
    }

    public function getConfigDescriptionArrayFromSpecificationDir($specificationDir)
    {
        $guzzleHeaderSpec = sprintf("%s/api_version_description.yml", $specificationDir);
        $yamlLoader = new Yaml();
        $headersArray = $yamlLoader->parse($guzzleHeaderSpec);
        $headersArray['operations'] = array();
        $finder = new Finder();
        $finder->files()->in($specificationDir)->notName("api_version_description.yml");

        foreach($finder as $file) {
            $spec = $yamlLoader->parse(file_get_contents($file->getRealPath()));
            foreach($spec['operations'] as $key => $operationArray) {
                $headersArray['operations'][$key] = $operationArray;
            }

            foreach($spec['models'] as $key => $operationModelArray) {
                $headersArray['models'][$key] = $operationModelArray;
            }

        }

        return $headersArray;
    }

} 