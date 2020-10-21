<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class ShippingZoneMethod extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'shipping_methods';

    /**
     * Retrieve all Items.
     *
     * @param array $options
     *
     * @return array
     */
    protected function all($options = [])
    {
        return WooCommerce::all($this->endpoint, $options);
    }

    /**
     * Retrieve single Item.
     *
     * @param int   $id
     * @param array $options
     *
     * @return object
     */
    protected function find($id, $options = [])
    {
        return WooCommerce::find("{$this->endpoint}/{$id}", $options);
    }
}
