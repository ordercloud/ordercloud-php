<?php namespace Ordercloud\Entities\Products;

use Ordercloud\Entities\Organisations\OrganisationShort;

class ProductOption extends ProductAddon
{
    /**
     * @var array|ProductOptionSet[]
     */
    private $unlockOptionSets;
    /**
     * @var array|ProductExtraSet[]
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
    public function __construct($id, $name, $description, $price, $enabled, OrganisationShort $organisation, array $unlockOptionSets = [], array $unlockExtraSets = [])
    {
        parent::__construct($id, $name, $description, $price, $enabled, $organisation);
        $this->unlockOptionSets = $unlockOptionSets;
        $this->unlockExtraSets = $unlockExtraSets;
    }

    /**
     * @return array|ProductOptionSet[]
     */
    public function getUnlockOptionSets()
    {
        return $this->unlockOptionSets;
    }

    /**
     * @return array|ProductExtraSet[]
     */
    public function getUnlockExtraSets()
    {
        return $this->unlockExtraSets;
    }
}
