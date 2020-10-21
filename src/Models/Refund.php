<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Refund extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint;

    /**
     * Retrieve all Items.
     *
     * @param int   $order_id
     * @param array $options
     *
     * @return array
     */
    protected function all($order_id, $options = [])
    {
        return WooCommerce::all("orders/{$order_id}/refunds", $options);
    }

    /**
     * Retrieve single Item.
     *
     * @param int   $order_id
     * @param int   $refund_id
     * @param array $options
     *
     * @return object
     */
    protected function find($order_id, $refund_id, $options = [])
    {
        return WooCommerce::find("orders/{$order_id}/refunds/{$refund_id}", $options);
    }

    /**
     * Create new Item.
     *
     * @param int   $order_id
     * @param array $data
     *
     * @return object
     */
    protected function create($order_id, $data)
    {
        return WooCommerce::create("orders/{$order_id}/refunds", $data);
    }

    /**
     * Destroy Item.
     *
     * @param int   $order_id
     * @param int   $refund_id
     * @param array $options
     *
     * @return object
     */
    protected function delete($order_id, $refund_id, $options = [])
    {
        return WooCommerce::delete("orders/{$order_id}/refunds/{$refund_id}", $options);
    }
}
