<?php

namespace spec\Betfair\Client;

use Betfair\Client\BetfairGuzzleClient;
use Betfair\Client\BetfairJsonRpcClientInterface;
use Betfair\CredentialInterface;
use Betfair\Model\Param;
use GuzzleHttp\Message\Response;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BetfairClientSpec extends ObjectBehavior
{
    function let(CredentialInterface $credential, BetfairGuzzleClient $betfairHttpClient)
    {
        $this->beConstructedWith($credential, $betfairHttpClient);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Betfair\Client\BetfairClient');
    }

    function it_do_sport_api_ng_request_with_authenticated_credentials(
        CredentialInterface $credential,
        BetfairGuzzleClient $betfairHttpClient,
        Param $param,
        Response $response
    )
    {
        $operationName = 'listApiThing';

        $credential->isAuthenticated()->willReturn(true);
        $credential->getApplicationKey()->willReturn('app-key');
        $credential->getSessionToken()->willReturn('session-token');

        $expectedGuzzleParameters = array(
            "X-Application" => 'app-key',
            "X-Authentication" => 'session-token',
            'method' => "SportsAPING/v1.0/" . $operationName,
            'params' => $param
        );

        $betfairHttpClient->sportApiNgRequest($expectedGuzzleParameters)
            ->shouldBeCalled()
            ->willReturn($response);

        $response->getBody()->shouldBeCalled()->willReturn('body response');

        $this->sportsApiNgRequest($operationName, $param)->shouldReturn("body response");
    }

    function it_authenticate_credentials(
        CredentialInterface $credential,
        BetfairGuzzleClient $betfairHttpClient,
        Response $response
    )
    {
        $credential->getUsername()->shouldBeCalled()->willReturn('usr1');
        $credential->getPassword()->shouldBeCalled()->willReturn('pwd1');
        $expectedLoginGuzzleParameters = array('username' => 'usr1', 'password' => 'pwd1');

        $betfairHttpClient->betfairLogin($expectedLoginGuzzleParameters)
            ->shouldBeCalled()
            ->willReturn($response);

        $response->getStatusCode()->shouldBeCalled()->willReturn(200);
        $response->getHeader('Set-Cookie')->shouldBeCalled()->willReturn("ssoid:123456");

        $credential->setSessionToken("123456")->shouldBeCalled();
        $this->authenticateCredential();
    }

    function it_raise_betfar_login_exception_when_user_authenticate_with_invalid_credentials(
        CredentialInterface $credential,
        BetfairGuzzleClient $betfairHttpClient,
        Response $response
    )
    {
        $credential->getUsername()->shouldBeCalled()->willReturn('usr1');
        $credential->getPassword()->shouldBeCalled()->willReturn('pwd1');
        $expectedLoginGuzzleParameters = array('username' => 'usr1', 'password' => 'pwd1');

        $betfairHttpClient->betfairLogin($expectedLoginGuzzleParameters)
        ->shouldBeCalled()
        ->willReturn($response);

        $response->getStatusCode()->shouldBeCalled()->willReturn(401);

        $this->shouldThrow('Betfair\Exception\BetfairLoginException')->
            duringAuthenticateCredential();
    }

    function it_raise_betfar_login_exception_when_response_not_have_set_cookie(
        CredentialInterface $credential,
        BetfairGuzzleClient $betfairHttpClient,
        Response $response
    )
    {
        $credential->getUsername()->shouldBeCalled()->willReturn('usr1');
        $credential->getPassword()->shouldBeCalled()->willReturn('pwd1');
        $expectedLoginGuzzleParameters = array('username' => 'usr1', 'password' => 'pwd1');

        $betfairHttpClient->betfairLogin($expectedLoginGuzzleParameters)
            ->shouldBeCalled()
            ->willReturn($response);

        $response->getStatusCode()->shouldBeCalled()->willReturn(200);
        $response->getHeader('Set-Cookie')->shouldBeCalled()->willReturn(null);

        $this->shouldThrow('Betfair\Exception\BetfairLoginException')->
            duringAuthenticateCredential();
    }

    function it_do_sport_api_ng_request_with_not_authenticated_credentials(
        CredentialInterface $credential,
        BetfairGuzzleClient $betfairHttpClient,
        Param $param,
        Response $response
    )
    {
        $operationName = 'listApiThing';

        $credential->isAuthenticated()->willReturn(false);

        $this->it_authenticate_credentials($credential, $betfairHttpClient, $response);

        $credential->getApplicationKey()->willReturn('app-key');
        $credential->getSessionToken()->willReturn('session-token');

        $expectedGuzzleParameters = array(
            "X-Application" => 'app-key',
            "X-Authentication" => 'session-token',
            'method' => "SportsAPING/v1.0/" . $operationName,
            'params' => $param
        );

        $betfairHttpClient->sportApiNgRequest($expectedGuzzleParameters)
            ->shouldBeCalled()
            ->willReturn($response);

        $response->getBody()->shouldBeCalled()->willReturn('body response');

        $this->sportsApiNgRequest($operationName, $param)->shouldReturn("body response");
    }
}
