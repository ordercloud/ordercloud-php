<?php namespace Ordercloud\Requests\Products\Criteria;

use JsonSerializable;
use Ordercloud\Requests\Criteria\Criteria;

class ProductTagTypeCriteria extends Criteria implements JsonSerializable
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;

    /**
     * @param int    $id
     * @param string $name
     */
    public function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return static
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     *
     * @return static
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    function jsonSerialize()
    {
        return array_filter([
            'id'   => $this->getId(),
            'name' => $this->getName(),
        ]);
    }
}
