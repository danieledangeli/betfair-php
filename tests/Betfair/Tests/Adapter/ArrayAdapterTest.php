<?php

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

}