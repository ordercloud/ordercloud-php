<?php namespace Ordercloud\Support\ExceptionGenerators;

use Illuminate\Container\Container;
use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\OrdercloudHttpException;

class ChainedExceptionGeneratorService implements ExceptionGeneratorService
{
    /**
     * @var ExceptionGenerator
     */
    private $chain;

    public function __construct(Container $container, array $generators)
    {
        $this->chain = $this->buildChain($container, $generators);
    }

    /**
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $exception
     *
     * @return OrdercloudRequestException
     */
    public function generateException(OrdercloudRequest $request, OrdercloudHttpException $exception)
    {
        return $this->chain->generateException($request, $exception);
    }

    /**
     * @param Container $container
     * @param array     $generators
     *
     * @return ExceptionGenerator
     */
    protected function buildChain(Container $container, array $generators)
    {
        $chainBuilder = ExceptionGeneratorBuilder::create();

        foreach ($generators as $generator) {
            $chainBuilder->chain($container->make($generator));
        }

        return $chainBuilder->getChain();
    }
}
