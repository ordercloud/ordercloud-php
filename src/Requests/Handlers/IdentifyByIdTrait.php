<?php namespace Ordercloud\Requests\Handlers;

trait IdentifyByIdTrait
{
    /**
     * @param array|int $ids
     *
     * @return array
     */
    public function identifyById(array $ids)
    {
        $mappedIds = array_map(
            function ($id) {
                return ['id' => $id];
            },
            $ids
        );

        return array_filter($mappedIds);
    }
}
