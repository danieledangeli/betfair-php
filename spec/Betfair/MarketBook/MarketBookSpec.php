<?php

namespace spec\Betfair\MarketBook;

use Betfair\Adapter\AdapterInterface;
use Betfair\Client\BetfairClientInterface;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Dependency\BetfairContainer;
use Betfair\Factory\MarketFilterFactoryInterface;
use Betfair\Factory\ParamFactoryInterface;
use Betfair\Model\MarketFilter;
use Betfair\Model\MarketFilterInterface;
use Betfair\Model\Param;
use Betfair\Model\ParamMarketBook;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MarketBookSpec extends ObjectBehavior
{
    protected $client;
    protected $adapterInterface;
    protected $paramFactory;
    protected $marketFilterFactory;

    function let(
        BetfairClientInterface $client,
        AdapterInterface $adapterInterface,
        ParamFactoryInterface $paramFactory,
        MarketFilterFactoryInterface $marketFilterFactory
    )
    {
        $this->client = $client;
        $this->adapterInterface =  $adapterInterface;
        $this->paramFactory = $paramFactory;
        $this->marketFilterFactory = $marketFilterFactory;

        $this->beConstructedWith(
            $this->client,
            $this->adapterInterface,
            $this->paramFactory,
            $this->marketFilterFactory
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\MarketBook\MarketBook');
    }

    function it_get_market_book_filter_by_market_ids(
        ParamMarketBook $paramMarketBook
    )
    {
        $response = '{response}';

        $this->paramFactory
            ->createParamMarketBook()
            ->shouldBeCalled()
            ->willReturn($paramMarketBook);

        $paramMarketBook
            ->setMarketIds(array(1))
            ->shouldBeCalled();

        $serializedValue = '{"marketIds":1}';

        $paramMarketBook
            ->jsonSerialize()
            ->shouldBeCalled()
            ->willReturn(array('marketIds' => 1));

        $this->client->sportsApiNgRequest(
            'listMarketBook',
            $serializedValue,
            "https://api.betfair.com/exchange/betting/json-rpc/v1")
            ->shouldBeCalled()
            ->willReturn($response);

        $this->adapterInterface->adaptResponse($response)
            ->shouldBeCalled()
            ->willReturn(array('response'));

        $this->getMarketBookFilterByMarketIds(array(1));
    }

}
