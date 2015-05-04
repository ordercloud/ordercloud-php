<?php namespace spec\Ordercloud\Support;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ordercloud\Support\Parser');
    }

    function it_can_parse_a_short_organisation()
    {
        $organisationData = [
            'id' => 1,
            'name' => 'Testing',
            'code' => 'TST'
        ];

        $this->parseOrganisationShort($organisationData)->shouldReturnAnInstanceOf('Ordercloud\Organisations\OrganisationShort');
    }
}
