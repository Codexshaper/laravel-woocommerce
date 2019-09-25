<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Product
{
    use QueryBuilderTrait;

    protected $endpoint = 'products';

    /**
     * Retrieve all products
     *
     * @param array $options
     *
     * @return array
     */
    public function all($options = [])
    {
        return WooCommerce::all('products', $options);
    }

    /**
     * Retrieve single product
     *
     * @param integer $id
     * @param array $options
     *
     * @return object
     */
    public function find($id, $options = [])
    {
        return collect(WooCommerce::find("products/{$id}", $options));
    }

    /**
     * Create new product
     *
     * @param array $data
     *
     * @return object
     */
    public function create($data)
    {
        return WooCommerce::create('products', $data);
    }

    public function update($id, $data)
    {
        return WooCommerce::update("products/{$id}", $data);
    }

    public function delete($id, $options = [])
    {
        return WooCommerce::delete("products/{$id}", $options);
    }

    public function batch($data)
    {
        return WooCommerce::create('products/batch', $options);
    }
}
