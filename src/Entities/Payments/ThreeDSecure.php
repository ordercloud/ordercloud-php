<?php namespace Ordercloud\Entities\Payments;

use JsonSerializable;

class ThreeDSecure implements JsonSerializable
{
    /**
     * @var string
     */
    private $form;

    /**
     * @param string $form
     */
    public function __construct($form)
    {
        $this->form = $form;
    }

    /**
     * @return string
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'from' => $this->getForm(),
        ];
    }
}
