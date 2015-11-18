<?php namespace Ordercloud\Entities\Payments;

class ThreeDSecure
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
}
