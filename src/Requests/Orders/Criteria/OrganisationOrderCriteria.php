<?php namespace Ordercloud\Requests\Orders\Criteria;

class OrganisationOrderCriteria extends UserOrderCriteria
{
    /**
     * @var string
     */
    private $fromDate;
    /**
     * @var string
     */
    private $toDate;
    /**
     * @var string
     */
    private $orderHash;

    /**
     * @return string
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * @param string $fromDate
     *
     * @return static
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * @param string $toDate
     *
     * @return static
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderHash()
    {
        return $this->orderHash;
    }

    /**
     * @param string $orderHash
     *
     * @return static
     */
    public function setOrderHash($orderHash)
    {
        $this->orderHash = $orderHash;

        return $this;
    }
}
