<?php namespace Ordercloud\Entities\Products;

class UnlockableProductOptionSet extends ProductOptionSet
{
    /**
     * @var array|int[]
     */
    private $unlockingOptionIds;

    /**
     * @param ProductOptionSet $optionSet
     * @param array|int[]      $unlockingOptionIds
     */
    public function __construct(ProductOptionSet $optionSet, array $unlockingOptionIds)
    {
        parent::__construct(
            $optionSet->getId(),
            $optionSet->getName(),
            $optionSet->getDisplayName(),
            $optionSet->getDescription(),
            $optionSet->isEnabled(),
            $optionSet->getOptions()
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
                foreach ($option->getUnlockOptionSets() as $unlockOptionSet) {
                    $linkedSets[$unlockOptionSet->getId()]['set'] = $unlockOptionSet;
                    $linkedSets[$unlockOptionSet->getId()]['options'][] = $option->getId();
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
     * that unlocks this OptionSet.
     *
     * @return array|int[]
     */
    public function getUnlockingOptionIds()
    {
        return $this->unlockingOptionIds;
    }
}
