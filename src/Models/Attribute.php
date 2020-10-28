<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\Query;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Attribute extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'products/attributes';

    /**
     * Retrieve all Items.
     *
     * @param int   $attribute_id
     * @param array $options
     *
     * @return array
     */
    protected function getTerms($attribute_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->all($options);
    }

    /**
     * Retrieve single Item.
     *
     * @param int   $attribute_id
     * @param int   $term_id
     * @param array $options
     *
     * @return object
     */
    protected function getTerm($attribute_id, $term_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->find($term_id, $options);
    }

    /**
     * Create new Item.
     *
     * @param int   $attribute_id
     * @param array $data
     *
     * @return object
     */
    protected function addTerm($attribute_id, $data)
    {
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->create($data);
    }

    /**
     * Update Existing Item.
     *
     * @param int   $attribute_id
     * @param int   $term_id
     * @param array $data
     *
     * @return object
     */
    protected function updateTerm($attribute_id, $term_id, $data)
    {
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->update($term_id, $data);
    }

    /**
     * Destroy Item.
     *
     * @param int   $attribute_id
     * @param int   $term_id
     * @param array $options
     *
     * @return object
     */
    protected function deleteTerm($attribute_id, $term_id, $options = [])
    {
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->delete($term_id, $options);
    }

    /**
     * Batch Update.
     *
     * @param int   $attribute_id
     * @param array $data
     *
     * @return object
     */
    protected function batchTerm($attribute_id, $data)
    {
        return Query::init()
            ->setEndpoint("products/attributes/{$attribute_id}/terms")
            ->batch($data);
    }
}
