<?php namespace spec\Ordercloud\Support\Http;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultUrlParameteriserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ordercloud\Support\Http\DefaultUrlParameteriser');
    }

    function it_can_parameterise_simple_parameters()
    {
        $params = [
            'access_token' => '123',
            'format'       => 'pretty',
        ];

        $this->parameterise($params)->shouldReturn('?access_token=123&format=pretty');
    }

    function it_can_parameterise_arrays()
    {
        $params = [
            'types' => [
                'ABC',
                'DEF',
                'GHI'
            ],
        ];

        $this->parameterise($params)->shouldReturn('?types=ABC&types=DEF&types=GHI');
    }
}
