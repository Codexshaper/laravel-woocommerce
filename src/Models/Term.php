<?php

namespace Codexshaper\WooCommerce\Models;

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
        $this->endpoint = "products/attributes/{$attribute_id}/terms";

        return self::all($options);
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
        $this->endpoint = "products/attributes/{$attribute_id}/terms";

        return self::find($id, $options);
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
        $this->endpoint = "products/attributes/{$attribute_id}/terms";

        return self::create($data);
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
        $this->endpoint = "products/attributes/{$attribute_id}/terms";

        return self::update($id, $data);
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
        $this->endpoint = "products/attributes/{$attribute_id}/terms";

        return self::delete($id, $options);
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
        $this->endpoint = "products/attributes/{$attribute_id}/terms";

        return self::batch($data);
    }

    /**
     * Paginate results.
     *
     * @param int $per_page
     * @param int $current_page
     *
     * @return array
     */
    protected function paginate(
        $attribute_id,
        $per_page = 10,
        $current_page = 1,
        $options = []
    ) {
        $this->endpoint = "products/attributes/{$attribute_id}/terms";

        return self::paginate($per_page, $current_page, $options);
    }

    /**
     * Count all results.
     *
     * @return int
     */
    protected function count($attribute_id)
    {
        $this->endpoint = "products/attributes/{$attribute_id}/terms";

        return self::count();
    }

    /**
     * Store data.
     *
     * @return array
     */
    public function save($attribute_id)
    {
        $this->endpoint = "products/attributes/{$attribute_id}/terms";

        return self::save();
    }
}
