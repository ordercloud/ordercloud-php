<?php namespace Ordercloud\Requests\Orders;

use Ordercloud\Support\CommandBus\Command;

class GetOrderScheduleOptionsRequest implements Command
{
    /**
     * @var array|int[]
     */
    private $organisationIds;
    /**
     * @var null|string
     */
    private $fromDate;
    /**
     * @var null|string
     */
    private $toDate;

    /**
     * @param int[]  $organisationIds
     * @param string $fromDate
     * @param string $toDate
     */
    public function __construct(array $organisationIds, $fromDate = null, $toDate = null)
    {
        $this->organisationIds = $organisationIds;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }

    /**
     * @return array|int[]
     */
    public function getOrganisationIds()
    {
        return $this->organisationIds;
    }

    /**
     * @return null|string
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * @return null|string
     */
    public function getToDate()
    {
        return $this->toDate;
    }
}
