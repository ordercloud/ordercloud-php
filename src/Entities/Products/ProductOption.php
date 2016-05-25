<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

class ProductOption extends ProductAddon implements JsonSerializable
{
    /**
     * @var array|ProductOptionSet[]
     * @reflectType Ordercloud\Entities\Products\ProductOptionSet
     */
    private $unlockOptionSets;
    /**
     * @var array|ProductExtraSet[]
     * @reflectType Ordercloud\Entities\Products\ProductExtraSet
     */
    private $unlockExtraSets;
    /**
     * @reflectName setDefault
     * @var bool
     */
    private $default;
    /**
     * @var bool
     */
    private $itemsPluFlatMappingEnabled;

    /**
     * @param int                      $id
     * @param string                   $name
     * @param string                   $description
     * @param float                    $price
     * @param boolean                  $enabled
     * @param array|ProductOptionSet[] $unlockOptionSets
     * @param array|ProductExtraSet[]  $unlockExtraSets
     * @param bool                     $default
     * @param bool                     $itemsPluFlatMappingEnabled
     */
    public function __construct($id, $name, $description, $price, $enabled, array $unlockOptionSets = [], array $unlockExtraSets = [], $default, $itemsPluFlatMappingEnabled)
    {
        parent::__construct($id, $name, $description, $price, $enabled);
        $this->unlockOptionSets = $unlockOptionSets ?: [];
        $this->unlockExtraSets = $unlockExtraSets ?: [];
        $this->default = $default;
        $this->itemsPluFlatMappingEnabled = $itemsPluFlatMappingEnabled;
    }

    /**
     * @return bool
     */
    public function hasUnlockOptionSets()
    {
        return ! empty($this->unlockOptionSets);
    }

    /**
     * @return array|ProductOptionSet[]
     */
    public function getUnlockOptionSets()
    {
        return $this->unlockOptionSets;
    }

    /**
     * @return bool
     */
    public function hasUnlockExtraSets()
    {
        return ! empty($this->unlockExtraSets);
    }

    /**
     * @return array|ProductExtraSet[]
     */
    public function getUnlockExtraSets()
    {
        return $this->unlockExtraSets;
    }

    /**
     * @return boolean
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     * @return boolean
     */
    public function isItemsPluFlatMappingEnabled()
    {
        return $this->itemsPluFlatMappingEnabled;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['unlockOptionSets'] = $this->getUnlockOptionSets();
        $json['unlockExtraSets'] = $this->getUnlockExtraSets();
        $json['default'] = $this->isDefault();
        $json['itemsPluFlatMappingEnabled'] = $this->isItemsPluFlatMappingEnabled();

        return $json;
    }
}
