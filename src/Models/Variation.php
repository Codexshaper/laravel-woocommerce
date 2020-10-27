<?php

namespace Codexshaper\WooCommerce\Models;

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
        $this->endpoint = "products/{$product_id}/variations";

        return self::all($options);
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
        $this->endpoint = "products/{$product_id}/variations";

        return self::find($id, $options);
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
        $this->endpoint = "products/{$product_id}/variations";

        return self::create($data);
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
        $this->endpoint = "products/{$product_id}/variations";

        return self::update($id, $data);
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
        $this->endpoint = "products/{$product_id}/variations";

        return self::delete($id, $options);
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
        $this->endpoint = "products/{$product_id}/variations";

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
        $product_id, 
        $per_page = 10, 
        $current_page = 1, 
        $options = []
    ) {
        $this->endpoint = "products/{$product_id}/variations";

        return self::paginate($per_page, $current_page, $options);
    }

    /**
     * Count all results.
     *
     * @return int
     */
    protected function count($product_id)
    {
        $this->endpoint = "products/{$product_id}/variations";

        return self::count();
    }

    /**
     * Store data.
     *
     * @return array
     */
    public function save($product_id)
    {
        $this->endpoint = "products/{$product_id}/variations";

        return self::save();
    }
}
