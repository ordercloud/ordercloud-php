<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

class UpdateProductTagRequest implements Command
{
    /**
     * @var int
     */
    private $tagId;
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
     * @param int    $tagId
     * @param string $name
     * @param string $description
     * @param string $shortDescription
     */
    public function __construct($tagId, $name, $shortDescription = null, $description = null)
    {
        $this->tagId = $tagId;
        $this->name = $name;
        $this->description = $description;
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return int
     */
    public function getTagId()
    {
        return $this->tagId;
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
}
