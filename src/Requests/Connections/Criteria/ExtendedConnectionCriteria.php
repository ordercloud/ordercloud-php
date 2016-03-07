<?php namespace Ordercloud\Requests\Connections\Criteria;

class ExtendedConnectionCriteria extends BasicConnectionCriteria
{
    /** @var string */
    private $type;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return static
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
