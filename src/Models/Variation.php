<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;

class Variation extends BaseModel
{
    protected $endpoint;

    /**
     * Retrieve all Items.
     *
     * @param integer $product_id
     * @param array $options
     *
     * @return array
     */
    protected function all($product_id, $options = [])
    {
        return WooCommerce::all("products/{$product_id}/variations", $options);
    }

    /**
     * Retrieve single Item.
     *
     * @param int   $product_id
     * @param int   $id
     * @param array $options
     *
     * @return object
     */
    protected function find($product_id, $id, $options = [])
    {
        return collect(WooCommerce::find("products/{$product_id}/variations/{$id}", $options));
    }

    /**
     * Create new Item.
     *
     * @param int   $product_id
     * @param array $data
     *
     * @return object
     */
    protected function create($product_id, $data)
    {
        return WooCommerce::create("products/{$product_id}/variations", $data);
    }

    /**
     * Update Existing Item.
     *
     * @param int   $product_id
     * @param int   $id
     * @param array $data
     *
     * @return object
     */
    protected function update($product_id, $id, $data)
    {
        return WooCommerce::update("products/{$product_id}/variations/{$id}", $data);
    }

    /**
     * Destroy Item.
     *
     * @param int   $product_id
     * @param int   $id
     * @param array $options
     *
     * @return object
     */
    protected function delete($product_id, $id, $options = [])
    {
        return WooCommerce::delete("products/{$product_id}/variations/{$id}", $options);
    }

    /**
     * Batch Update.
     *
     * @param int   $product_id
     * @param array $data
     *
     * @return object
     */
    protected function batch($product_id, $data)
    {
        return WooCommerce::create("products/{$product_id}/variations/batch", $data);
    }
}
