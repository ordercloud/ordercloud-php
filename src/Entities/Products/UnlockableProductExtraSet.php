<?php namespace Ordercloud\Entities\Products;

class UnlockableProductExtraSet extends ProductExtraSet
{
    /**
     * @var array|int[]
     */
    private $unlockingOptionIds;

    /**
     * @param ProductExtraSet $extraSet
     * @param array|int[]     $unlockingOptionIds
     */
    public function __construct(ProductExtraSet $extraSet, array $unlockingOptionIds)
    {
        parent::__construct(
            $extraSet->getId(),
            $extraSet->getName(),
            $extraSet->getDisplayName(),
            $extraSet->getDescription(),
            $extraSet->isEnabled(),
            $extraSet->getExtras()
        );
        $this->unlockingOptionIds = $unlockingOptionIds;
    }

    /**
     * @param Product $product
     *
     * @return array|static[]
     */
    public static function createFromProduct(Product $product)
    {
        $linkedSets = [];
        $productOptionSets = $product->getOptionSets();

        while ($set = array_shift($productOptionSets)) {
            foreach ($set->getOptions() as $option) {
                $productOptionSets = array_merge($productOptionSets, $option->getUnlockOptionSets());
                foreach ($option->getUnlockExtraSets() as $unlockExtraSet) {
                    $linkedSets[$unlockExtraSet->getId()]['set'] = $unlockExtraSet;
                    $linkedSets[$unlockExtraSet->getId()]['options'][] = $option->getId();
                }
            }
        }

        $linkedSetInstances = [];

        foreach ($linkedSets as $linkedSet) {
            $linkedSetInstances[] = new static($linkedSet['set'], $linkedSet['options']);
        }

        return $linkedSetInstances;
    }


    /**
     * Returns the IDs of the options
     * that unlocks this ExtraSet.
     *
     * @return array|int[]
     */
    public function getUnlockingOptionIds()
    {
        return $this->unlockingOptionIds;
    }
}
