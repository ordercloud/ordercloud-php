<?php namespace Ordercloud\Entities\Products;

use Ordercloud\Entities\Organisations\OrganisationShort;

class ProductOption extends ProductAddon
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
     * @param int                      $id
     * @param string                   $name
     * @param string                   $description
     * @param float                    $price
     * @param boolean                  $enabled
     * @param OrganisationShort        $organisation
     * @param array|ProductOptionSet[] $unlockOptionSets
     * @param array|ProductExtraSet[]  $unlockExtraSets
     */
    public function __construct($id, $name, $description, $price, $enabled, array $unlockOptionSets = [], array $unlockExtraSets = [])
    {
        parent::__construct($id, $name, $description, $price, $enabled);
        $this->unlockOptionSets = $unlockOptionSets ?: [];
        $this->unlockExtraSets = $unlockExtraSets ?: [];
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
}
