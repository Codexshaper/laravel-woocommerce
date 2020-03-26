<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;

class Note extends BaseModel
{

    protected $endpoint;

    /**
     * Retrieve all Items
     *
     * @param integer $order_id
     * @param array $options
     *
     * @return array
     */
    protected function all($order_id, $options = [])
    {
        return WooCommerce::all("orders/{$order_id}/notes", $options);
    }

    /**
     * Retrieve single Item
     *
     * @param integer $order_id
     * @param integer $note_id
     * @param array $options
     *
     * @return object
     */
    protected function find($order_id, $note_id, $options = [])
    {
        return collect(WooCommerce::find("orders/{$order_id}/notes/{$note_id}", $options));
    }

    /**
     * Create new Item
     *
     * @param integer $order_id
     * @param array $data
     *
     * @return object
     */
    protected function create($order_id, $data)
    {
        return WooCommerce::create("orders/{$order_id}/notes", $data);
    }

    /**
     * Destroy Item
     *
     * @param integer $order_id
     * @param integer $note_id
     * @param array $options
     *
     * @return object
     */
    protected function delete($order_id, $note_id, $options = [])
    {
        return WooCommerce::delete("orders/{$order_id}/notes/{$note_id}", $options);
    }
}
