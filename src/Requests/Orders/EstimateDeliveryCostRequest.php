<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Support\CommandBus\Command;

class EstimateDeliveryCostRequest implements Command
{
    /**
     * @var int
     */
    private $orderingOrdganisationId;
    /**
     * @var int
     */
    private $geoId;
    /**
     * @var array|int[]
     */
    private $merchantIds;

    public function __construct($orderingOrdganisationId, $geoId, array $merchantIds)
    {
        $this->orderingOrdganisationId = $orderingOrdganisationId;
        $this->geoId = $geoId;
        $this->merchantIds = $merchantIds;
    }

    /**
     * @return int
     */
    public function getOrderingOrdganisationId()
    {
        return $this->orderingOrdganisationId;
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
