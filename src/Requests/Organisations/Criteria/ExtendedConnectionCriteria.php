<?php namespace Ordercloud\Requests\Organisations\Criteria;

/**
 * @deprecated See Ordercloud\Requests\Connections\Criteria\ExtendedConnectionCriteria
 *
 * Class ExtendedConnectionCriteria
 */
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
