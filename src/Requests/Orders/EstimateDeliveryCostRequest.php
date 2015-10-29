<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class EstimateDeliveryCostRequest
 *
 * @see Ordercloud\Requests\Orders\Handlers\EstimateDeliveryCostRequestHandler
 */
class EstimateDeliveryCostRequest implements Command
{
    /**
     * @var int
     */
    private $deliveryServiceOrganisationId;
    /**
     * @var int
     */
    private $geoId;
    /**
     * @var array|int[]
     */
    private $merchantIds;

    public function __construct($deliveryServiceOrganisationId, $geoId, array $merchantIds)
    {
        $this->deliveryServiceOrganisationId = $deliveryServiceOrganisationId;
        $this->geoId = $geoId;
        $this->merchantIds = $merchantIds;
    }

    /**
     * @return int
     */
    public function getDeliveryServiceOrganisationId()
    {
        return $this->deliveryServiceOrganisationId;
    }

    /**
     * @return int
     */
    public function getGeoId()
    {
        return $this->geoId;
    }

    /**
     * @return array|int[]
     */
    public function getMerchantDtos()
    {
        return array_map(
            function ($id)
            {
                return ['id' => $id];
            },
            $this->merchantIds
        );
    }
}
