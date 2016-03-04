<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

class CreateProductTagRequest implements Command
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $shortDescription;
    /**
     * @var int
     */
    private $organisationId;
    /**
     * @var int
     */
    private $tagTypeId;

    /**
     * @param int    $organisationId
     * @param int    $tagTypeId
     * @param string $name
     * @param string $description
     * @param string $shortDescription
     */
    public function __construct($organisationId, $tagTypeId, $name, $shortDescription, $description)
    {
        $this->name = $name;
        $this->description = $description;
        $this->shortDescription = $shortDescription;
        $this->organisationId = $organisationId;
        $this->tagTypeId = $tagTypeId;
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
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * @return int
     */
    public function getTagTypeId()
    {
        return $this->tagTypeId;
    }
}
