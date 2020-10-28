<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\Query;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Note extends BaseModel
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
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->all($options);
    }

    /**
     * Retrieve single Item.
     *
     * @param int   $order_id
     * @param int   $note_id
     * @param array $options
     *
     * @return object
     */
    protected function find($order_id, $note_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->find($note_id, $options);
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
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->create($data);
    }

    /**
     * Destroy Item.
     *
     * @param int   $order_id
     * @param int   $note_id
     * @param array $options
     *
     * @return object
     */
    protected function delete($order_id, $note_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->delete($note_id, $options);
    }

    /**
     * Paginate results.
     *
     *
     * @param int   $order_id
     * @param int   $per_page
     * @param int   $current_page
     * @param array $options
     *
     * @return array
     */
    protected function paginate(
        $order_id,
        $per_page = 10,
        $current_page = 1,
        $options = []
    ) {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->paginate($per_page, $current_page, $options);
    }

    /**
     * Count all results.
     *
     * @param int $order_id
     *
     * @return int
     */
    protected function count($order_id)
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->count();
    }

    /**
     * Store data.
     *
     * @param int $order_id
     *
     * @return array
     */
    public function save($order_id)
    {
        return Query::init()
            ->setEndpoint("orders/{$order_id}/notes")
            ->save();
    }
}
