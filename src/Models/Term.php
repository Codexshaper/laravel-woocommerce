<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Term extends BaseModel
{
    use QueryBuilderTrait;
    
    protected $endpoint;

    /**
     * Retrieve all Items.
     *
     * @param int   $attribute_id
     * @param array $options
     *
     * @return array
     */
    protected function all($attribute_id, $options = [])
    {
        return WooCommerce::all("products/attributes/{$attribute_id}/terms", $options);
    }

    /**
     * Retrieve single Item.
     *
     * @param int   $attribute_id
     * @param int   $id
     * @param array $options
     *
     * @return object
     */
    protected function find($attribute_id, $id, $options = [])
    {
        return WooCommerce::find("products/attributes/{$attribute_id}/terms/{$id}", $options);
    }

    /**
     * Create new Item.
     *
     * @param int   $attribute_id
     * @param array $data
     *
     * @return object
     */
    protected function create($attribute_id, $data)
    {
        return WooCommerce::create("products/attributes/{$attribute_id}/terms", $data);
    }

    /**
     * Update Existing Item.
     *
     * @param int   $attribute_id
     * @param int   $id
     * @param array $data
     *
     * @return object
     */
    protected function update($attribute_id, $id, $data)
    {
        return WooCommerce::update("products/attributes/{$attribute_id}/terms/{$id}", $data);
    }

    /**
     * Destroy Item.
     *
     * @param int   $attribute_id
     * @param int   $id
     * @param array $options
     *
     * @return object
     */
    protected function delete($attribute_id, $id, $options = [])
    {
        return WooCommerce::delete("products/attributes/{$attribute_id}/terms/{$id}", $options);
    }

    /**
     * Batch Update.
     *
     * @param int   $attribute_id
     * @param array $data
     *
     * @return object
     */
    protected function batch($attribute_id, $data)
    {
        return WooCommerce::create("products/attributes/{$attribute_id}/terms/batch", $data);
    }
}
