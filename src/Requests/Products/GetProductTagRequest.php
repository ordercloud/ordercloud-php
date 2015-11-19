<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetProductTagRequest
 *
 * @see Ordercloud\Requests\Products\Handlers\GetProductTagRequestHandler
 */
class GetProductTagRequest implements Command
{
    /** @var int */
    protected $tagId;

    /**
     * @param int $tagId
     */
    public function __construct($tagId)
    {
        $this->tagId = $tagId;
    }

    /**
     * @return int
     */
    public function getTagId()
    {
        return $this->tagId;
    }
}
