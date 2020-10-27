<?php

namespace Codexshaper\WooCommerce\Models;

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
        $this->endpoint = "orders/{$order_id}/notes";

        return self::all($options);
    }

    protected function note($order_id, $note_id, $options = [])
    {
        $this->endpoint = "orders/{$order_id}/notes";

        return self::find($note_id, $options);
    }

    protected function createNote($order_id, $data = [])
    {
        $this->endpoint = "orders/{$order_id}/notes";

        return self::create($data);
    }

    protected function deleteNote($order_id, $note_id, $options = [])
    {
        $this->endpoint = "orders/{$order_id}/notes";

        return self::delete($note_id, $options);
    }

    /*
     * Refund
     */

    protected function refunds($order_id, $options = [])
    {
        $this->endpoint = "orders/{$order_id}/refunds";

        return self::all($options);
    }

    protected function refund($order_id, $refund_id, $options = [])
    {
        $this->endpoint = "orders/{$order_id}/refunds";

        return self::find($refund_id, $options);
    }

    protected function createRefund($order_id, $data = [])
    {
        $this->endpoint = "orders/{$order_id}/refunds";

        return self::create($data);
    }

    protected function deleteRefund($order_id, $refund_id, $options = [])
    {
        $this->endpoint = "orders/{$order_id}/refunds";

        return self::delete($refund_id, $options);
    }
}
