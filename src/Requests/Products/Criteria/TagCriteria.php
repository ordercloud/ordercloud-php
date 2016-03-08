<?php namespace Ordercloud\Requests\Products\Criteria;

use Ordercloud\Requests\Criteria\Criteria;
use Ordercloud\Requests\Criteria\PaginationCriterion;

class TagCriteria extends Criteria
{
    use PaginationCriterion;
    
    /**
     * @var string
     */
    private $typeName;
    /**
     * @var int
     */
    private $typeId;
    /**
     * @var int
     */
    private $organisationId;
    /**
     * @var boolean
     */
    private $showDisabled;

    /**
     * @return string
     */
    public function getTypeName()
    {
        return $this->typeName;
    }

    /**
     * @param string $typeName
     *
     * @return static
     */
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;

        return $this;
    }

    /**
     * @return int
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     *
     * @return static
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }

    /**
     * @param int $organisationId
     *
     * @return static
     */
    public function setOrganisationId($organisationId)
    {
        $this->organisationId = $organisationId;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isShowDisabled()
    {
        return $this->showDisabled;
    }

    /**
     * @param boolean $showDisabled
     *
     * @return static
     */
    public function setShowDisabled($showDisabled)
    {
        $this->showDisabled = $showDisabled;

        return $this;
    }
}
