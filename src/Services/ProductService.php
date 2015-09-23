<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Products\Product;
use Ordercloud\Entities\Products\ProductCollection;
use Ordercloud\Entities\Products\ProductTag;
use Ordercloud\Requests\Products\Criteria\ProductCriteria;
use Ordercloud\Requests\Products\FindProductsRequest;
use Ordercloud\Requests\Products\GetProductRequest;
use Ordercloud\Requests\Products\GetProductTagsForOrganisationByTypeNameRequest;

class ProductService extends OrdercloudService
{
    /**
     * @param int $productId
     *
     * @return Product
     */
    public function getProduct($productId)
    {
        return $this->request(
            new GetProductRequest($productId)
        );
    }

    /**
     * @param ProductCriteria $criteria
     *
     * @return ProductCollection|Product[]
     */
    public function getProducts(ProductCriteria $criteria)
    {
        return $this->request(
            new FindProductsRequest($criteria)
        );
    }

    /**
     * @param $organisationId
     * @param $tagName
     *
     * @return array|ProductTag[]
     */
    public function getProductTags($organisationId, $tagName)
    {
        return $this->request(
            new GetProductTagsForOrganisationByTypeNameRequest($organisationId, $tagName)
        );
    }
}
