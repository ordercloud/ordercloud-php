<?php namespace Ordercloud\Requests\Auth;

use Ordercloud\Support\CommandBus\Command;

class GetLoginUrlRequest extends AbstractGetUrlRequest
{
    public function getType()
    {
        return 'login';
    }
}
