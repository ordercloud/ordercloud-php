<?php namespace Ordercloud\Entities\Transactions;

class Currency implements \JsonSerializable
{
    /**
     * @var string
     */
    private $isoCode;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $symbol;
    /**
     * @var string
     */
    private $format;

    /**
     * @param string $isoCode
     * @param string $name
     * @param string $symbol
     * @param string $format
     */
    public function __construct($isoCode, $name, $symbol, $format)
    {
        $this->isoCode = $isoCode;
        $this->name = $name;
        $this->symbol = $symbol;
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    function jsonSerialize()
    {
        return [
            'isoCode' => $this->getIsoCode(),
            'name'    => $this->getName(),
            'symbol'  => $this->getSymbol(),
            'format'  => $this->getFormat(),
        ];
    }
}
