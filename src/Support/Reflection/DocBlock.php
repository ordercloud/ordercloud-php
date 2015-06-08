<?php namespace Ordercloud\Support\Reflection;

class DocBlock
{
    /** @var string */
    private $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function hasTag($tagName)
    {
        return strpos($this->comment, "@{$tagName}") !== false;
    }

    public function getTag($tagName)
    {
        preg_match("/@{$tagName} ([^\n\s\*]+)/", $this->comment, $matches);

        return $matches[1];
    }
}
