<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Order extends BaseModel
{
    use QueryBuilderTrait;
    
    protected $endpoint = 'orders';

    /*
     * Note
     */

    protected function notes($order_id, $options = [])
    {
        return WooCommerce::all("orders/{$order_id}/notes", $options);
    }

    protected function note($order_id, $note_id)
    {
        return WooCommerce::find("orders/{$order_id}/notes/{$note_id}");
    }

    protected function createNote($order_id, $data = [])
    {
        return WooCommerce::create("orders/{$order_id}/notes", $data);
    }

    protected function deleteNote($order_id, $note_id, $options = [])
    {
        return WooCommerce::delete("orders/{$order_id}/notes/{$note_id}", $options);
    }

    /*
     * Refund
     */

    protected function refunds($order_id, $options = [])
    {
        return WooCommerce::all("orders/{$order_id}/refunds", $options);
    }

    protected function refund($order_id, $refund_id)
    {
        return WooCommerce::find("orders/{$order_id}/refunds/{$refund_id}");
    }

    protected function createRefund($order_id, $data = [])
    {
        return WooCommerce::create("orders/{$order_id}/refunds", $data);
    }

    protected function deleteRefund($order_id, $refund_id, $options = [])
    {
        return WooCommerce::delete("orders/{$order_id}/refunds/{$refund_id}", $options);
    }
}
