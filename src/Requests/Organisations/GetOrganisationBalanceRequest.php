<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Support\CommandBus\Command;

class GetOrganisationBalanceRequest implements Command
{
    /**
     * @var int
     */
    private $organisationId;
    /**
     * @var null|string
     */
    private $from;
    /**
     * @var null|string
     */
    private $upTo;
    /**
     * @var string[]|array
     */
    private $transactionTypes;

    /**
     * @param int            $organisationId
     * @param string|null    $from
     * @param string|null    $upTo
     * @param string[]|array $transactionTypes
     */
    public function __construct($organisationId, $from = null, $upTo = null, array $transactionTypes = null)
    {
        $this->organisationId = $organisationId;
        $this->from = $from;
        $this->upTo = $upTo;
        $this->transactionTypes = $transactionTypes;
    }

    /**
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * @return null|string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return null|string
     */
    public function getUpTo()
    {
        return $this->upTo;
    }

    /**
     * @return string[]|array
     */
    public function getTransactionTypes()
    {
        return $this->transactionTypes;
    }
}
