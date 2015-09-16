<?php namespace spec\Ordercloud\Support\Reflection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EntityReflectorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('spec\Ordercloud\Support\Reflection\Foo', [
            'id' => 1,
            'bars' => [
                [
                    'id' => 1,
                    'name' => 'baz'
                ]
            ],
            'defaultBar' => [
                'id' => 1,
                'name' => 'baz'
            ],
            'exampleAlias' => 'aliased'
        ]);
    }

    function it_can_reflect_a_class()
    {
        $reflection = $this->reflect();
        $reflection->id->shouldBe(1);
        $reflection->bars->shouldBeArray();
    }

    function it_parses_array_parameters()
    {
        $this->reflect()->bars[0]->shouldBeAnInstanceOf('spec\Ordercloud\Support\Reflection\Bar');
        $this->reflect()->bars[0]->id->shouldBe(1);
        $this->reflect()->bars[0]->name->shouldBe('baz');
    }

    function it_parses_aliased_arguments()
    {
        $this->reflect()->name->shouldBe('aliased');
    }

    function it_throws_argument_not_provided_exception()
    {
        $this->beConstructedWith('spec\Ordercloud\Support\Reflection\Foo', [
            'bars' => [
                [
                    'id' => 1,
                    'name' => 'baz'
                ]
            ],
            'defaultBar' => [
                'id' => 1,
                'name' => 'baz'
            ],
            'exampleAlias' => 'aliased'
        ]);

        $this->shouldThrow('Ordercloud\Support\Reflection\ArgumentNotProvidedException')->duringReflect();
    }

    function it_throws_null_required_argument_exception()
    {
        $this->beConstructedWith('spec\Ordercloud\Support\Reflection\Foo', [
            'id' => 1,
            'bars' => [
                [
                    'id' => 1,
                    'name' => 'baz'
                ]
            ],
            'defaultBar' => null,
            'exampleAlias' => 'aliased'
        ]);

        $this->shouldThrow('Ordercloud\Support\Reflection\NullRequiredArgumentException')->duringReflect();
    }

    function it_throws_entity_parse_exception()
    {
        $this->shouldThrow('Ordercloud\Support\Reflection\EntityParseException')
            ->duringParse('spec\Ordercloud\Support\Reflection\Foo', []);
    }
}

class Foo {
    /** @var int */
    public $id;
    /**
     * @var array|Bar[]
     * @reflectType spec\Ordercloud\Support\Reflection\Bar
     */
    public $bars;
    /**
     * @var Bar
     */
    private $defaultBar;
    /**
     * @var string
     * @reflectName exampleAlias
     */
    public $name;

    public function __construct($id, array $bars, Bar $defaultBar, $name)
    {
        $this->bars = $bars;
        $this->id = $id;
        $this->name = $name;
        $this->defaultBar = $defaultBar;
    }
}
class Bar {
    /** @var int */
    public $id;
    /** @var string */
    public $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
