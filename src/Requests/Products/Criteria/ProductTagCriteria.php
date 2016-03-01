<?php namespace Ordercloud\Requests\Products\Criteria;

use JsonSerializable;
use Ordercloud\Requests\Criteria\Criteria;

class ProductTagCriteria extends Criteria implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var ProductTagTypeCriteria
     */
    private $type;

    /**
     * @param int                    $id
     * @param string                 $name
     * @param ProductTagTypeCriteria $type
     */
    public function __construct($id = null, $name = null, ProductTagTypeCriteria $type = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
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
     * @return ProductTagTypeCriteria
     */
    public function getType()
    {
        return $this->type;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'id'   => $this->getId(),
            'name' => $this->getName(),
            'tagType' => $this->getType(),
        ]);
    }
}
