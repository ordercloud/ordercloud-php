<?php namespace Ordercloud\Entities\Organisations;

class OrganisationType
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $plural;

    public function __construct($id, $name, $plural)
    {
        $this->id = $id;
        $this->name = $name;
        $this->plural = $plural;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPlural()
    {
        return $this->plural;
    }

    /**
     * @param string $plural
     */
    public function setPlural($plural)
    {
        $this->plural = $plural;
    }
}
