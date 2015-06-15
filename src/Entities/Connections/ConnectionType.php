<?php namespace Ordercloud\Entities\Connections;

class ConnectionType
{
    const CHAIN_STORE = 'C';
    const CHILD = 'CH';
    const COMMUNICATION_PROVIDER = 'COM';
    const COURIER_SERVICE = 'CS';
    const DELIVERY_SERVICE = 'DS';
    const FRANCHISE = 'F';
    const INVENTORY_MANAGER = 'IM';
    const MARKETPLACE = 'M';
    const ORDER_MANAGER = 'OM';
    const PAYMENT_GATEWAY = 'PG';
    const POS = 'POS';
    const RESELLER = 'R';

    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $code;

    public function __construct($id, $name, $code)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
}
