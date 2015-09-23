<?php namespace Ordercloud\Entities\Organisations;

class OrganisationIndustry
{
    /**
     * Fast Food and Restaurants
     */
    const FOOD = 'Food';
    /**
     * Clothing Stores
     */
    const CLOTHING = 'Clothing';
    /**
     * Retail Stores
     */
    const RETAIL = 'Retail';
    /**
     * Furniture Stores
     */
    const FURNITURE = 'Furniture';

    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;

    public function __construct($id, $name, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }
}
