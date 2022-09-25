<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\Query;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Subscription extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'subscriptions';

    /**
     * Retrieve all notes.
     *
     * @param int   $subscription_id
     * @param array $options
     *
     * @return array
     */
    protected function notes($subscription_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("subscriptions/{$subscription_id}/notes")
            ->all($options);
    }

    /**
     * Retreive a note.
     *
     * @param int   $subscription_id
     * @param int   $note_id
     * @param array $options
     *
     * @return object
     */
    protected function note($subscription_id, $note_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("subscriptions/{$subscription_id}/notes")
            ->find($note_id, $options);
    }

    /**
     * Create a note.
     *
     * @param int   $subscription_id
     * @param array $data
     *
     * @return object
     */
    protected function createNote($subscription_id, $data = [])
    {
        return Query::init()
            ->setEndpoint("subscriptions/{$subscription_id}/notes")
            ->create($data);
    }

    /**
     * Delete a note.
     *
     * @param int   $subscription_id
     * @param int   $note_id
     * @param array $options
     *
     * @return object
     */
    protected function deleteNote($subscription_id, $note_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("subscriptions/{$subscription_id}/notes")
            ->delete($note_id, $options);
    }

    /**
     * Retrieve all orders for the subscription.
     *
     * @param int   $subscription_id
     * @param array $options
     *
     * @return array
     */
    protected function orders($subscription_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("subscriptions/{$subscription_id}/orders")
            ->all($options);
    }
}
