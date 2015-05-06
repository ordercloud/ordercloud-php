<?php namespace Ordercloud\Entities\Products;

class ProductTagType
{
    /** @var integer */
    private $id;
    /** @var string */
    private $description;
    /** @var string */
    private $name;
    /** @var string */
    private $dateCreated;
    /** @var string */
    private $lastUpdated;

    function __construct($id, $description, $name, $dateCreated, $lastUpdated)
    {
        $this->id = $id;
        $this->description = $description;
        $this->name = $name;
        $this->dateCreated = $dateCreated;
        $this->lastUpdated = $lastUpdated;
    }
}
