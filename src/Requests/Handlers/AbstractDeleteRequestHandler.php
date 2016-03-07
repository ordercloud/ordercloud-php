<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\OrdercloudRequest;

abstract class AbstractDeleteRequestHandler extends AbstractRequestHandler
{
    protected $method = OrdercloudRequest::METHOD_DELETE;
}
