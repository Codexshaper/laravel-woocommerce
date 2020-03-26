<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Attribute extends BaseModel
{
	use QueryBuilderTrait;
	
    protected $endpoint = 'products/attributes';

    /**
     * Retrieve all Items
     *
     * @param integer $attribute_id
     * @param array $options
     *
     * @return array
     */
    protected function getTerms($attribute_id, $options = [])
    {
    	$this->endpoint = "products/attributes/{$attribute_id}/terms";
    	return self::all($options);
    }

    /**
     * Retrieve single Item
     *
     * @param integer $attribute_id
     * @param integer $term_id
     * @param array $options
     *
     * @return object
     */
    protected function getTerm($attribute_id, $term_id, $options = [])
    {
    	$this->endpoint = "products/attributes/{$attribute_id}/terms";
    	return self::find($term_id, $options);
    }

    /**
     * Create new Item
     *
     * @param integer $attribute_id
     * @param array $data
     *
     * @return object
     */
    protected function addTerm($attribute_id, $data)
    {
    	$this->endpoint = "products/attributes/{$attribute_id}/terms";
    	return self::create($data);
    }

    /**
     * Update Existing Item
     *
     * @param integer $attribute_id
     * @param integer $term_id
     * @param array $data
     *
     * @return object
     */
    protected function updateTerm($attribute_id, $term_id, $data)
    {
    	$this->endpoint = "products/attributes/{$attribute_id}/terms";
    	return self::update($term_id, $data);
    }

    /**
     * Destroy Item
     *
     * @param integer $attribute_id
     * @param integer $term_id
     * @param array $options
     *
     * @return object
     */
    protected function deleteTerm($attribute_id, $term_id, $options = [])
    {
    	$this->endpoint = "products/attributes/{$attribute_id}/terms";
    	return self::delete($term_id, $options);
    }

    /**
     * Batch Update
     *
     * @param integer $attribute_id
     * @param array $data
     *
     * @return object
     */
    protected function batchTerm($attribute_id, $data)
    {
    	$this->endpoint = "products/attributes/{$attribute_id}/terms";
    	return self::batch($data);
    }
}
