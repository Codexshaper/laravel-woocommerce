<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;

class ShippingMethod extends BaseModel
{
    protected $endpoint = 'shipping_methods';

    /**
     * Retrieve all Items
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
     * Retrieve single Item
     *
     * @param integer $id
     * @param array $options
     *
     * @return object
     */
    protected function find($id, $options = [])
    {
        return collect(WooCommerce::find("{$this->endpoint}/{$id}", $options));
    }
}
