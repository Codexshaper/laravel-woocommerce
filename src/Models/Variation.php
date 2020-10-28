<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\Query;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Variation extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint;

    /**
     * Retrieve all Items.
     *
     * @param int   $product_id
     * @param array $options
     *
     * @return array
     */
    protected function all($product_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("products/{$product_id}/variations")
            ->all($options);
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
        return Query::init()
            ->setEndpoint("products/{$product_id}/variations")
            ->find($id, $options);
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
        return Query::init()
            ->setEndpoint("products/{$product_id}/variations")
            ->create($data);
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
        return Query::init()
            ->setEndpoint("products/{$product_id}/variations")
            ->update($id, $data);
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
        return Query::init()
            ->setEndpoint("products/{$product_id}/variations")
            ->delete($id, $options);
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
        return Query::init()
            ->setEndpoint("products/{$product_id}/variations")
            ->batch($data);
    }

    /**
     * Paginate results.
     *
     * @param int   $product_id
     * @param int   $per_page
     * @param int   $current_page
     * @param array $options
     *
     * @return array
     */
    protected function paginate(
        $product_id,
        $per_page = 10,
        $current_page = 1,
        $options = []
    ) {
        return Query::init()
            ->setEndpoint("products/{$product_id}/variations")
            ->paginate($per_page, $current_page, $options);
    }

    /**
     * Count all results.
     *
     * @param int $product_id
     *
     * @return int
     */
    protected function count($product_id)
    {
        return Query::init()
            ->setEndpoint("products/{$product_id}/variations")
            ->count();
    }

    /**
     * Store data.
     *
     * @param int $product_id
     *
     * @return array
     */
    public function save($product_id)
    {
        return Query::init()
            ->setEndpoint("products/{$product_id}/variations")
            ->save();
    }
}
