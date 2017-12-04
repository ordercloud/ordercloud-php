<?php namespace spec\Ordercloud\Support\Http;

use Ordercloud\Support\Http\GuzzleClient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuzzleClientSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ordercloud\Support\Http\GuzzleClient');
    }

    function it_can_send_simple_request()
    {
        $url = "https://qa-api.ordercloud.com";
        $method = "GET";
//        $url = "http://requestb.in/sutjdksu";
//        $method = "POST";
        $username = "demo@ordercloud.com";
        $password = "password";
        $orgToken = "181e6449197f4660445d18bcef0654c8";
        $accessToken = null;


        $client = GuzzleClient::create($url, $username, $password, $orgToken, $accessToken);
        $client->send($url, $method, []);

    }
}
