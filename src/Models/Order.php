<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\Query;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Order extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'orders';

    /**
     * Retrieve all notes.
     *
     * @param int   $order_id
     * @param array $options
     *
     * @return array
     */
    protected function notes($order_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->all($options);
    }

    /**
     * Retreive a note.
     *
     * @param int   $order_id
     * @param int   $note_id
     * @param array $options
     *
     * @return object
     */
    protected function note($order_id, $note_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->find($note_id, $options);
    }

    /**
     * Create a note.
     *
     * @param int   $order_id
     * @param array $data
     *
     * @return object
     */
    protected function createNote($order_id, $data = [])
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->create($data);
    }

    /**
     * Delete a note.
     *
     * @param int   $order_id
     * @param int   $note_id
     * @param array $options
     *
     * @return object
     */
    protected function deleteNote($order_id, $note_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->delete($note_id, $options);
    }

    /**
     * Retrieve all refunds.
     *
     * @param int   $order_id
     * @param array $options
     *
     * @return array
     */
    protected function refunds($order_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/refunds")
            ->all($options);
    }

    /**
     * Retrieve a refund.
     *
     * @param int   $order_id
     * @param int   $refund_id
     * @param array $options
     *
     * @return object
     */
    protected function refund($order_id, $refund_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/refunds")
            ->find($refund_id, $options);
    }

    /**
     * Create refund.
     *
     * @param int   $order_id
     * @param array $data
     *
     * @return object
     */
    protected function createRefund($order_id, $data = [])
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/refunds")
            ->create($data);
    }

    /**
     * Delete refund.
     *
     * @param int   $order_id
     * @param int   $refund_id
     * @param array $options
     *
     * @return object
     */
    protected function deleteRefund($order_id, $refund_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/refunds")
            ->delete($refund_id, $options);
    }
}
