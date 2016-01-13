<?php namespace Ordercloud\Entities\Orders;

use JsonSerializable;

class OrderInvoice implements JsonSerializable
{
    /**
     * @var string
     */
    private $fileName;
    /**
     * @var string
     */
    private $content;

    /**
     * @param string $fileName
     * @param string $content
     */
    public function __construct($fileName, $content)
    {
        $this->fileName = $fileName;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'fileName' => $this->getFileName(),
            'content' => $this->getContent(),
        ];
    }
}
