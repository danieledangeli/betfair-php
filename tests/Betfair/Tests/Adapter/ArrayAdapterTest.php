<?php
/**
 * This file is part of the Betfair library.
 *
 * (c) Daniele D'Angeli <dangeli88.daniele@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Betfair\Tests\Adapter;


use Betfair\Adapter\ArrayAdapter;
use Betfair\Tests\ResponseServiceMock;

class ArrayAdapterTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ArrayAdapter */
    protected $arrayAdapter;

    public function setUp()
    {
        $this->arrayAdapter = new ArrayAdapter();
    }
    public function testAdaptResponse()
    {
        $response = $this->arrayAdapter
            ->adaptResponse(ResponseServiceMock::getJsonRpcBetfairGenericaResponse());

        $this->assertTrue(is_array($response));
        $this->assertEquals(1, $response['id']);
        $this->assertEquals('2.0', $response['jsonrpc']);
        $this->assertTrue(is_array($response['result']));
    }

    public function testexampleApp()
    {
        $credential = new \Betfair\Credential("PuJtD2nA9b8IQEkI", "erlangb88", 'annarita05011988');
        $betFairClient = new \Betfair\Client\BetfairClient($credential);
        $betFairClient->login();
        $jsonRpcClient = new \Betfair\Client\JsonRpcClient();
        $betFair = new \Betfair\Betfair($credential, $jsonRpcClient, new \Betfair\Adapter\ArrayRpcAdapter());

        $eventType = $betFair->getBetfairEventType();
        $result = $eventType->getAllEventFilterByIds(array(1));
    }

}