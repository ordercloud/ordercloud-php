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
        $url = "https://test-api.ordercloud.com/resource/about/version";
        $method = "GET";
//        $url = "http://requestb.in/sutjdksu";
//        $method = "POST";
        $username = "demo@ordercloud.com";
        $password = "password";
        $orgToken = "aa41d9e05a6ac75dc67fdf839e43b5f4";
        $accessToken = null;


        $client = GuzzleClient::create($url, $username, $password, $orgToken, $accessToken);
        $client->send($url, $method, []);

    }
}
