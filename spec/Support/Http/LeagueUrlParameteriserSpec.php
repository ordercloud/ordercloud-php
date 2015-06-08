<?php namespace spec\Ordercloud\Support\Http;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LeagueUrlParameteriserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ordercloud\Support\Http\LeagueUrlParameteriser');
    }

    function it_can_append_simple_parameters()
    {
        $params = [
            'access_token' => '123',
            'format'       => 'pretty',
        ];

        $this->appendParametersToUrl($params, 'https://test.domain.com')
            ->shouldReturn('/?access_token=123&format=pretty');

        $this->appendParametersToUrl($params, 'resource/orders/user/55')
            ->shouldReturn('/resource/orders/user/55?access_token=123&format=pretty');

        $this->appendParametersToUrl($params, '/resource/orders/user/55')
            ->shouldReturn('/resource/orders/user/55?access_token=123&format=pretty');
    }

    function it_can_append_arrays()
    {
        $params = [
            'types' => [
                'ABC',
                'DEF',
                'GHI'
            ],
        ];

        $this->appendParametersToUrl($params, 'https://test.domain.com')
            ->shouldReturn('/?types=ABC&types=DEF&types=GHI');

        $this->appendParametersToUrl($params, 'resource/orders/user/55')
            ->shouldReturn('/resource/orders/user/55?types=ABC&types=DEF&types=GHI');
    }
}
