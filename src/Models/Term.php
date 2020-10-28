<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\Query;
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
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->all($options);
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
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->find($id, $options);
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
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->create($data);
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
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->update($id, $data);
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
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->delete($id, $options);
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
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->batch($data);
    }

    /**
     * Paginate results.
     *
     * @param int   $attribute_id
     * @param int   $per_page
     * @param int   $current_page
     * @param array $options
     *
     * @return array
     */
    protected function paginate(
        $attribute_id,
        $per_page = 10,
        $current_page = 1,
        $options = []
    ) {
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->paginate($per_page, $current_page, $options);
    }

    /**
     * Count all results.
     *
     * @param int $attribute_id
     *
     * @return int
     */
    protected function count($attribute_id)
    {
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->count();
    }

    /**
     * Store data.
     *
     * @param int $attribute_id
     *
     * @return array
     */
    public function save($attribute_id)
    {
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->save();
    }
}
