<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\ExceptionGenerators\ExceptionGeneratorService;
use Ordercloud\Support\Http\Client;
use Ordercloud\Support\Http\OrdercloudHttpException;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Http\UrlParameteriser;

class OrdercloudRequestHandler implements CommandHandler
{
    /** @var Client */
    private $client;

    /**
     * @var ExceptionGeneratorService
     */
    private $exceptionGenerator;

    public function __construct(Client $client, ExceptionGeneratorService $exceptionGenerator)
    {
        $this->client = $client;
        $this->exceptionGenerator = $exceptionGenerator;
    }

    /**
     * @param OrdercloudRequest $request
     *
     * @return Response
     *
     * @throws OrdercloudRequestException
     */
    public function handle($request)
    {
        try {
            return $this->client->send(
                $request->getUrl(),
                $request->getMethod(),
                $request->getParameters(),
                $request->getHeaders()
            );
        }
        catch (OrdercloudHttpException $e) {
            throw $this->exceptionGenerator->generateException($request, $e);
        }
    }
}
