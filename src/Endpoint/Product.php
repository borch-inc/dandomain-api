<?php
namespace Loevgaard\Dandomain\Api\Endpoint;

use Assert\Assert;

/**
 * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help
 */
class Product extends Endpoint
{
    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/GetProduct
     *
     * @param string $productNumber
     * @param int $siteId
     * @return array
     */
    public function getProduct(string $productNumber, int $siteId) : array
    {
        Assert::that($productNumber)->minLength(1, 'The length of $productNumber has to be > 0');
        Assert::that($siteId)->greaterThan(0, 'The $siteId has to be positive');

        return (array)$this->master->doRequest(
            'GET',
            sprintf('/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/%s/%d', rawurlencode($productNumber), $siteId)
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/GetProductsInCategory
     *
     * @param int $categoryId
     * @param int $siteId
     * @return array
     */
    public function getProductsInCategory(int $categoryId, int $siteId) : array
    {
        Assert::that($categoryId)->greaterThan(0, 'The $categoryId has to be positive');
        Assert::that($siteId)->greaterThan(0, 'The $siteId has to be positive');

        return (array)$this->master->doRequest(
            'GET',
            sprintf('/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/Products/%d/%d', $categoryId, $siteId)
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/GetCategories
     *
     * @param int $siteId
     * @return array
     */
    public function getCategories(int $siteId) : array
    {
        Assert::that($siteId)->greaterThan(0, 'The $siteId has to be positive');

        return (array)$this->master->doRequest(
            'GET',
            sprintf('/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/Categories/%d', $siteId)
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/GetSubCategories
     *
     * @param int $categoryId
     * @param int $siteId
     * @return array
     */
    public function getSubCategories(int $categoryId, int $siteId) : array
    {
        Assert::that($categoryId)->greaterThan(0, 'The $categoryId has to be positive');
        Assert::that($siteId)->greaterThan(0, 'The $siteId has to be positive');

        return (array)$this->master->doRequest(
            'GET',
            sprintf('/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/Categories/%d/%d', $categoryId, $siteId)
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/GetProductByMetadata
     *
     * @param string $productNumber
     * @param array $context
     * @return array
     */
    public function getProductByMetadata(string $productNumber, array $context) : array
    {
        Assert::that($productNumber)->minLength(1, 'The length of $productNumber has to be > 0');
        Assert::that($context)->notEmpty();

        return (array)$this->master->doRequest(
            'POST',
            sprintf('/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/%s', rawurlencode($productNumber)),
            $context
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/GetProductsInCategoryByMetadata
     *
     * @param int $categoryId
     * @param array $context
     * @return array
     */
    public function getProductsInCategoryByMetadata(int $categoryId, array $context) : array
    {
        Assert::that($categoryId)->greaterThan(0, 'The $categoryId has to be positive');
        Assert::that($context)->notEmpty();

        return (array)$this->master->doRequest(
            'POST',
            sprintf('/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/Products/%d', $categoryId),
            $context
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/GetCategory
     *
     * @param int $categoryId
     * @param int $siteId
     * @return array
     */
    public function getCategory(int $categoryId, int $siteId) : array
    {
        Assert::that($categoryId)->greaterThan(0, 'The $categoryId has to be positive');
        Assert::that($siteId)->greaterThan(0, 'The $siteId has to be positive');

        return (array)$this->master->doRequest(
            'GET',
            sprintf('/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/Category/%d/%d', $categoryId, $siteId)
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/FindProductNumbersByKeyword
     *
     * @param string $keyword
     * @param int $siteId
     * @return array
     */
    public function findProductNumbersByKeyword(string $keyword, int $siteId) : array
    {
        Assert::that($keyword)->minLength(1, 'The length of $keyword has to be > 0');
        Assert::that($siteId)->greaterThan(0, 'The $siteId has to be positive');

        return (array)$this->master->doRequest(
            'GET',
            sprintf(
                '/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/FindProductNumbersByKeyword/%s/%d',
                rawurlencode($keyword),
                $siteId
            )
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/GetProductsByBarcode
     *
     * @param string $barCode
     * @param int $siteId
     * @return array
     */
    public function getProductsByBarcode(string $barCode, int $siteId) : array
    {
        Assert::that($barCode)->minLength(1, 'The length of $barCode has to be > 0');
        Assert::that($siteId)->greaterThan(0, 'The $siteId has to be positive');

        return (array)$this->master->doRequest(
            'GET',
            sprintf('/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/ByBarcode/%s/%d', rawurlencode($barCode), $siteId)
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/GetProductsByModificationDate
     *
     * @param \DateTimeInterface $modificationDate
     * @param int $siteId
     * @return array
     */
    public function getProductsByModificationDate(\DateTimeInterface $modificationDate, int $siteId) : array
    {
        Assert::that($siteId)->greaterThan(0, 'The $siteId has to be positive');

        return (array)$this->master->doRequest(
            'GET',
            sprintf('/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/ByModificationDate/%s/%d', $modificationDate->format('Y-m-d'), $siteId)
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/FindProductsByProductNumbers
     *
     * @param int $siteId
     * @param array $productNumbers
     * @param int $page
     * @param int $pageSize
     * @return array
     */
    public function findProductsByProductNumbers(int $siteId, array $productNumbers, int $page = 1, int $pageSize = 100) : array
    {
        Assert::that($siteId)->greaterThan(0, 'The $siteId has to be positive');
        Assert::that($productNumbers)->notEmpty();
        Assert::thatAll($productNumbers)->minLength(1, 'All product numbers in $productNumbers must have a length > 0');
        Assert::that($page)->greaterThan(0, 'The $page has to be positive');
        Assert::that($pageSize)->greaterThan(0, 'The $pageSize has to be positive');

        $body = [
            'Identifiers' => $productNumbers,
            'PageIndex' => $page,
            'Pagesize' => $pageSize
        ];

        return (array)$this->master->doRequest(
            'GET',
            sprintf('/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/FindProductsByProductNumbers/%d', $siteId),
            $body
        );
    }

    /**
     * @see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductService/help/operations/GetProductsInModifiedInterval
     *
     * @param int $siteId
     * @param \DateTimeInterface $dateStart
     * @param \DateTimeInterface $dateEnd
     * @return array
     */
    public function getProductsInModifiedInterval(int $siteId, \DateTimeInterface $dateStart, \DateTimeInterface $dateEnd) : array
    {
        Assert::that($siteId)->greaterThan(0, 'The $siteId has to be positive');
        Assert::that($dateStart)->lessThan($dateEnd, '$dateStart has to be before $dateEnd');

        return (array)$this->master->doRequest(
            'GET',
            sprintf(
                '/admin/WEBAPI/Endpoints/v1_0/ProductService/{KEY}/GetByModifiedInterval/%d?start=%s&end=%s',
                $siteId,
                $dateStart->format('Y-m-d\TH:i:s'),
                $dateEnd->format('Y-m-d\TH:i:s')
            )
        );
    }
}
