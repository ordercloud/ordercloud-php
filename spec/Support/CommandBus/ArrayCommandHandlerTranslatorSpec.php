<?php namespace spec\Ordercloud\Support\CommandBus {

    use Ordercloud\BarCommand;
    use Ordercloud\BazCommand;
    use Ordercloud\FooCommand;
    use Ordercloud\FooCommandHandler;
    use Ordercloud\Support\CommandBus\Command;
    use Ordercloud\Support\CommandBus\CommandHandler;
    use PhpSpec\ObjectBehavior;
    use Prophecy\Argument;

    class ArrayCommandHandlerTranslatorSpec extends ObjectBehavior
    {
        function let()
        {
            $this->beConstructedWith(
                [
                    'Ordercloud\FooCommand' => new FooCommandHandler(),
                    'Ordercloud\BarCommand' => function () {
                        return new FooCommandHandler();
                    }
                ]
            );
        }

        function it_is_initializable()
        {
            $this->shouldHaveType('Ordercloud\Support\CommandBus\ArrayCommandHandlerTranslator');
        }

        function it_returns_null_when_there_is_no_handler_registered_for_a_command()
        {
            $command = new BazCommand();

            $this->resolve($command)->shouldReturn(null);
        }

        function it_can_resolve_a_command_handler_instance()
        {
            $command = new FooCommand();

            $this->resolve($command)->shouldReturnAnInstanceOf('Ordercloud\Support\CommandBus\CommandHandler');
        }

        function it_can_resolve_a_command_handler_instance_from_a_closure()
        {
            $command = new BarCommand();

            $this->resolve($command)->shouldReturnAnInstanceOf('Ordercloud\Support\CommandBus\CommandHandler');
        }
    }
}

/*
 * Test stubs
 */
namespace Ordercloud {

    use Ordercloud\Support\CommandBus\Command;
    use Ordercloud\Support\CommandBus\CommandHandler;

    class FooCommand implements Command { }

    class BazCommand implements Command { }

    class BarCommand implements Command { }

    class FooCommandHandler implements CommandHandler {
        public function handle($request) { }
    }
}
