<?php namespace Ordercloud\Entities\Products;

use Ordercloud\Entities\Organisations\OrganisationShort;

class ProductExtra
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var number */
    private $price;
    /** @var boolean */
    private $enabled;
    /** @var OrganisationShort */
    private $organisation;
    /** @var array|ProductTag[] */
    private $tags;

    public function __construct($id, $name, $description, $price, $enabled, OrganisationShort $organisation, array $tags)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->enabled = $enabled;
        $this->organisation = $organisation;
        $this->tags = $tags;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return number
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return OrganisationShort
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * @return array|ProductTag[]
     */
    public function getTags()
    {
        return $this->tags;
    }
}
