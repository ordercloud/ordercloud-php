<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

class EnableProductTagRequest implements Command
{
    /**
     * @var int
     */
    private $tagId;

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
