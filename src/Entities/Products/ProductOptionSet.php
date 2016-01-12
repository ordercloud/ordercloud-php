<?php namespace Ordercloud\Entities\Products;

use JsonSerializable;

class ProductOptionSet extends AbstractProductAddonSet implements JsonSerializable
{
    /**
     * @var array|ProductOption[]
     * @reflectType Ordercloud\Entities\Products\ProductOption
     */
    protected $options;

    /**
     * @param int                   $id
     * @param string                $name
     * @param string                $displayName
     * @param string                $description
     * @param boolean               $enabled
     * @param array|ProductOption[] $options
     */
    public function __construct($id, $name, $displayName, $description, $enabled, array $options)
    {
        parent::__construct($id, $name, $displayName, $description, $enabled);
        $this->options = $options;
    }

    /**
     * @return array|ProductOption[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param ProductAddonComparator $comparator
     *
     * @return array|ProductOption[]
     */
    public function getSortedOptions(ProductAddonComparator $comparator)
    {
        $options = $this->getOptions();

        usort($options, $comparator);

        return $options;
    }

    /**
     * @param $optionID
     *
     * @return ProductOption|null
     */
    public function getOptionByID($optionID)
    {
        foreach ($this->getOptions() as $option) {
            if ($option->getId() == $optionID) {
                return $option;
            }
        }

        return null;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['options'] = $this->getOptions();

        return $json;
    }
}
