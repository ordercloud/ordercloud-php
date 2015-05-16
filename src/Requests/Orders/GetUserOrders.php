<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Support\CommandBus\Command;
use string;

class GetUserOrders implements Command
{
    /** @var int */
    protected $userID;
    /** @var array|string[] */
    private $orderStatuses;
    /** @var array|string[] */
    private $paymentStatuses;
    /** @var int */
    private $page;
    /** @var int */
    private $pageSize;
    /** @var string */
    private $sort;
    /** @var string|null */
    protected $accessToken;

    function __construct($userID, array $orderStatuses = [], array $paymentStatuses = [], $page = 1, $pageSize = 10, $sort = 'date+', $accessToken = null)
    {
        $this->userID = $userID;
        $this->orderStatuses = $orderStatuses;
        $this->paymentStatuses = $paymentStatuses;
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->sort = $sort;
        $this->accessToken = $accessToken;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return array|string[]
     */
    public function getOrderStatuses()
    {
        return $this->orderStatuses;
    }

    /**
     * @return array|string[]
     */
    public function getPaymentStatuses()
    {
        return $this->paymentStatuses;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
