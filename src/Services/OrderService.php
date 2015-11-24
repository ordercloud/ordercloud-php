<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Orders\Order;
use Ordercloud\Entities\Orders\OrderCollection;
use Ordercloud\Entities\Orders\ScheduleOption;
use Ordercloud\Requests\Exceptions\NotFoundRequestException;
use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\Orders\CreateOrderRequest;
use Ordercloud\Requests\Orders\Criteria\UserOrderCriteria;
use Ordercloud\Requests\Orders\EstimateDeliveryCostRequest;
use Ordercloud\Requests\Orders\GetOrderRequest;
use Ordercloud\Requests\Orders\GetOrderScheduleOptionsRequest;
use Ordercloud\Requests\Orders\GetUserOrdersRequest;

class OrderService extends OrdercloudService
{
    /**
     * @param int $orderId
     *
     * @return Order
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
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
     *
     * @throws OrdercloudRequestException
     */
    public function getUserOrders($userId, UserOrderCriteria $criteria = null)
    {
        $criteria = $criteria ?: UserOrderCriteria::create();

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
     *
     * @throws OrdercloudRequestException
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
     * @see Ordercloud\Requests\Orders\Builders\CreateOrderRequestBuilder
     *
     * @return int The order ID
     *
     * @throws OrdercloudRequestException
     */
    public function createOrder(CreateOrderRequest $request)
    {
        return $this->request($request);
    }

    /**
     * @param int[]  $organisationIds
     * @param string $fromDate
     * @param string $toDate
     *
     * @return ScheduleOption[]
     *
     * @throws OrdercloudRequestException
     */
    public function getScheduleOptions(array $organisationIds, $fromDate = null, $toDate = null)
    {
        return $this->request(new GetOrderScheduleOptionsRequest($organisationIds, $fromDate, $toDate));
    }
}
