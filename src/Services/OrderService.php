<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Orders\Order;
use Ordercloud\Entities\Orders\OrderCollection;
use Ordercloud\Requests\Orders\CreateOrderRequest;
use Ordercloud\Requests\Orders\Criteria\UserOrderCriteria;
use Ordercloud\Requests\Orders\EstimateDeliveryCostRequest;
use Ordercloud\Requests\Orders\GetOrderRequest;
use Ordercloud\Requests\Orders\GetUserOrdersRequest;

class OrderService extends OrdercloudService
{
    /**
     * @param int $orderId
     *
     * @return Order
     */
    public function getOrder($orderId)
    {
        return $this->request(
            new GetOrderRequest($orderId)
        );
    }

    /**
     * @param int               $userId
     * @param UserOrderCriteria $criteria
     *
     * @return OrderCollection
     */
    public function getUserOrders($userId, UserOrderCriteria $criteria)
    {
        return $this->request(
            new GetUserOrdersRequest($userId, $criteria)
        );
    }

    /**
     * @param int       $deliveryServiceOrganisationId
     * @param int       $geoId
     * @param array|int $merchantIds
     *
     * @return float
     */
    public function estimateDeliveryCost($deliveryServiceOrganisationId, $geoId, array $merchantIds)
    {
        return $this->request(
            new EstimateDeliveryCostRequest($deliveryServiceOrganisationId, $geoId, $merchantIds)
        );
    }

    /**
     * @param CreateOrderRequest $request
     *
     * @return int The order ID
     *
     * @see Ordercloud\Requests\Orders\Builders\CreateOrderRequestBuilder
     */
    public function createOrder(CreateOrderRequest $request)
    {
        return $this->request($request);
    }
}
