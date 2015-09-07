<?php namespace Ordercloud\Services;

use Ordercloud\Ordercloud;
use Ordercloud\Support\CommandBus\Command;

class OrdercloudService
{
    /**
     * @var Ordercloud
     */
    private $ordercloud;

    /**
     * @param Ordercloud $ordercloud
     */
    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param Command $request
     *
     * @return mixed
     */
    protected function request(Command $request)
    {
        return $this->ordercloud->exec($request);
    }
}
