<?php namespace Ordercloud\Requests\Auth;

use Ordercloud\Support\CommandBus\Command;

class GetRegisterUrlRequest extends AbstractGetUrlRequest
{
    public function getType()
    {
        return 'register';
    }
}
