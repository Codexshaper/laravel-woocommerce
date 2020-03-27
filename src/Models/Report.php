<?php

namespace Codexshaper\WooCommerce\Models;

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
        $this->endpoint = 'reports/sales';

        return self::all($options);
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
        $this->endpoint = 'reports/top_sellers';

        return self::all($options);
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
        $this->endpoint = 'reports/coupons/totals';

        return self::all($options);
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
        $this->endpoint = 'reports/customers/totals';

        return self::all($options);
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
        $this->endpoint = 'reports/orders/totals';

        return self::all($options);
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
        $this->endpoint = 'reports/products/totals';

        return self::all($options);
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
        $this->endpoint = 'reports/reviews/totals';

        return self::all($options);
    }
}
