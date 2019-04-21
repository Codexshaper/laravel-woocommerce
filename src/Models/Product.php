<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;

class Product
{
    public function all()
    {
    	return WooCommerce::all('products');
    }

    public function find($id)
    {
    	return WooCommerce::find('products/'.$id);
    }

    public function create( $data ) {
    	return WooCommerce::create('products', $data);
    }

    public function update( $id, $data ) {
    	return WooCommerce::update('products/'.$id, $data);
    }

    public function delete( $id, $options=[] ) {
    	return WooCommerce::delete('products/'.$id, $options);
    }

    public function batch( $data ) {
    	return WooCommerce::create('products/batch', $options);
    }
}
