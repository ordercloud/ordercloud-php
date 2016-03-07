<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Products\ProductTag;
use Ordercloud\Entities\Products\ProductTagCollection;
use Ordercloud\Entities\Products\ProductTagType;
use Ordercloud\Requests\Exceptions\ConflictRequestException;
use Ordercloud\Requests\Exceptions\NotFoundRequestException;
use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\Products\CreateProductTagRequest;
use Ordercloud\Requests\Products\Criteria\TagCriteria;
use Ordercloud\Requests\Products\DeleteProductTagRequest;
use Ordercloud\Requests\Products\DisableProductTagRequest;
use Ordercloud\Requests\Products\EnableProductTagRequest;
use Ordercloud\Requests\Products\GetProductTagRequest;
use Ordercloud\Requests\Products\GetProductTagsRequest;
use Ordercloud\Requests\Products\GetProductTagTypesRequest;
use Ordercloud\Requests\Products\UpdateProductTagRequest;

class ProductTagService extends OrdercloudService
{
    /**
     * @param $tagId
     *
     * @return ProductTag
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
     */
    public function getTag($tagId)
    {
        return $this->request(new GetProductTagRequest($tagId));
    }

    /**
     * @param TagCriteria $criteria
     *
     * @return ProductTagCollection|ProductTag[]
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
     */
    public function getTags(TagCriteria $criteria = null)
    {
        $criteria = $criteria ?: TagCriteria::create();

        return $this->request(new GetProductTagsRequest($criteria));
    }

    /**
     * @return ProductTagType[]
     *
     * @throws OrdercloudRequestException
     */
    public function getTagTypes()
    {
        return $this->request(new GetProductTagTypesRequest());
    }

    /**
     * @param int         $organisationId
     * @param int         $tagTypeId
     * @param string      $name
     * @param string|null $shortDescription
     * @param string|null $description
     *
     * @return int The new product tag ID
     *
     * @throws OrdercloudRequestException
     * @throws ConflictRequestException
     * @throws NotFoundRequestException
     */
    public function createTag($organisationId, $tagTypeId, $name, $shortDescription = null, $description = null)
    {
        return $this->request(
            new CreateProductTagRequest($organisationId, $tagTypeId, $name, $shortDescription, $description)
        );
    }

    /**
     * @param int         $tagId
     * @param string      $name
     * @param string|null $shortDescription
     * @param string|null $description
     *
     * @throws OrdercloudRequestException
     * @throws ConflictRequestException
     * @throws NotFoundRequestException
     */
    public function updateTag($tagId, $name, $shortDescription = null, $description = null)
    {
        $this->request(new UpdateProductTagRequest($tagId, $name, $shortDescription, $description));
    }

    /**
     * @param int $tagId
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
     */
    public function enableTag($tagId)
    {
        $this->request(new EnableProductTagRequest($tagId));
    }

    /**
     * @param int $tagId
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
     */
    public function disableTag($tagId)
    {
        $this->request(new DisableProductTagRequest($tagId));
    }

    /**
     * @param int $tagId
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
     */
    public function deleteTag($tagId)
    {
        $this->request(new DeleteProductTagRequest($tagId));
    }
}
