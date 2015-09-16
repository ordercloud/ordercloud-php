<?php namespace Ordercloud\Requests\Handlers;

trait FormatBooleanTrait
{
    /**
     * @param $value
     *
     * @return string|null
     */
    public function formatBoolean($value)
    {
        if (is_null($value)) {
            return null;
        }

        return $value ? 'true' : 'false';
    }
}
