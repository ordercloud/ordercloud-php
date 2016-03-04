<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Requests\Products\Criteria\TagCriteria;
use Ordercloud\Support\CommandBus\Command;

class GetProductTagsRequest implements Command
{
    /**
     * @var TagCriteria
     */
    private $criteria;

    /**
     * @param TagCriteria $criteria
     */
    public function __construct(TagCriteria $criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * @return TagCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
