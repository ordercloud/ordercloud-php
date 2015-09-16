<?php namespace Ordercloud\Requests\Handlers;

trait IdentifyByIdTrait
{
    /**
     * @param array|int[] $ids
     *
     * @return array
     */
    public function identifyAllById(array $ids = null)
    {
        if (is_null($ids)) return null;

        $mappedIds = array_map([$this, 'identifyById'], $ids);

        return array_filter($mappedIds);
    }

    /**
     * @param int $id
     *
     * @return array|null
     */
    public function identifyById($id)
    {
        if (is_null($id)) return null;

        return ['id' => $id];
    }
}
