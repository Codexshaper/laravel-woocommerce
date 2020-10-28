<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\Query;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Report extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'reports';

    /**
     * Retrieve all sales.
     *
     * @param array $options
     *
     * @return array
     */
    protected function sales($options = [])
    {
        return Query::init()
            ->setEndpoint('reports/sales')
            ->all($options);
    }

    /**
     * Retrieve all top sellers.
     *
     * @param array $options
     *
     * @return array
     */
    protected function topSellers($options = [])
    {
        return Query::init()
            ->setEndpoint('reports/top_sellers')
            ->all($options);
    }

    /**
     * Retrieve all coupons.
     *
     * @param array $options
     *
     * @return array
     */
    protected function coupons($options = [])
    {
        return Query::init()
            ->setEndpoint('reports/coupons/totals')
            ->all($options);
    }

    /**
     * Retrieve all customers.
     *
     * @param array $options
     *
     * @return array
     */
    protected function customers($options = [])
    {
        return Query::init()
            ->setEndpoint('reports/customers/totals')
            ->all($options);
    }

    /**
     * Retrieve all orders.
     *
     * @param array $options
     *
     * @return array
     */
    protected function orders($options = [])
    {
        return Query::init()
            ->setEndpoint('reports/orders/totals')
            ->all($options);
    }

    /**
     * Retrieve all products.
     *
     * @param array $options
     *
     * @return array
     */
    protected function products($options = [])
    {
        return Query::init()
            ->setEndpoint('reports/products/totals')
            ->all($options);
    }

    /**
     * Retrieve all reviews.
     *
     * @param array $options
     *
     * @return array
     */
    protected function reviews($options = [])
    {
        return Query::init()
            ->setEndpoint('reports/reviews/totals')
            ->all($options);
    }
}
