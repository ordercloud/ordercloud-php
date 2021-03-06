<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

abstract class ProductAddon extends AbstractProductAddon implements JsonSerializable
{
    /** @var boolean */
    private $enabled;

    /**
     * @param int                      $id
     * @param string                   $name
     * @param string                   $description
     * @param float                    $price
     * @param boolean                  $enabled
     */
    public function __construct($id, $name, $description, $price, $enabled)
    {
        parent::__construct($id, $name, $description, $price);
        $this->enabled = $enabled;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['enabled'] = $this->isEnabled();

        return $json;
    }
}
