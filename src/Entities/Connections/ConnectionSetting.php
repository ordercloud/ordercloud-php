<?php namespace Ordercloud\Entities\Connections;

use JsonSerializable;

class ConnectionSetting implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $value;
    /**
     * @var ConnectionSettingKey
     */
    private $key;
    /**
     * @var string
     */
    private $startDate;
    /**
     * @var string
     */
    private $endDate;

    public function __construct($id, $value, ConnectionSettingKey $key, $startDate, $endDate)
    {
        $this->id = $id;
        $this->value = $value;
        $this->key = $key;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return ConnectionSettingKey
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    function jsonSerialize()
    {
        return [
            'id'        => $this->getId(),
            'value'     => $this->getValue(),
            'key'       => $this->getKey(),
            'startDate' => $this->getStartDate(),
            'endDate'   => $this->getEndDate(),
        ];
    }
}
