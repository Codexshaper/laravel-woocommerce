<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Customer
{
    use QueryBuilderTrait;

    protected $endpoint = 'customers';

    public function all($options = [])
    {
        return WooCommerce::all('customers', $options);
    }

    public function find($id, $options = [])
    {
        return WooCommerce::find("customers/{$id}", $options);
    }

    public function create($data)
    {
        return WooCommerce::create('customers', $data);
    }

    public function update($id, $data)
    {
        return WooCommerce::update("customers/{$id}", $data);
    }

    public function delete($id, $options = [])
    {
        return WooCommerce::delete("customers/{$id}", $options);
    }

    public function batch($data)
    {
        return WooCommerce::create('customers/batch', $options);
    }
}
