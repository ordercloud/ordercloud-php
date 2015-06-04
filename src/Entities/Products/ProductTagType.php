<?php namespace Ordercloud\Entities\Products;

class ProductTagType
{
    /** @var integer */
    private $id;
    /** @var string */
    private $description;
    /** @var string */
    private $name;

    public function __construct($id, $description, $name)
    {
        $this->id = $id;
        $this->description = $description;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
