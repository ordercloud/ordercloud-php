<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\OrdercloudRequest;

abstract class AbstractPutRequestHandler extends AbstractRequestHandler
{
    protected $method = OrdercloudRequest::METHOD_PUT;
}
