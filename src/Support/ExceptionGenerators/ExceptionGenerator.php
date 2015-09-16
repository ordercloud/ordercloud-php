<?php namespace Ordercloud\Support\ExceptionGenerators;

use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\Http\OrdercloudHttpException;

abstract class ExceptionGenerator
{
    /**
     * @var ExceptionGenerator
     */
    protected $successor;

    /**
     * Attempt to generate the exception. If the exception can't be generated
     * here, then pass the exception to the next generator.
     *
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $exception
     *
     * @return OrdercloudRequestException
     */
    abstract public function generateException(OrdercloudRequest $request, OrdercloudHttpException $exception);

    /**
     * Set the ExceptionGenerator that should be executed next
     * if this generator can't handle the exception.
     *
     * @param ExceptionGenerator $generator
     */
    public function succeedWith(ExceptionGenerator $generator)
    {
        $this->successor = $generator;
    }

    /**
     * Pass the exception to be handled by the successor.
     *
     * @param OrdercloudRequest       $request
     * @param OrdercloudHttpException $exception
     *
     * @return OrdercloudRequestException
     */
    public function next(OrdercloudRequest $request, OrdercloudHttpException $exception)
    {
        return $this->successor->generateException($request, $exception);
    }
}
