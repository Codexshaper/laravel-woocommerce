<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;

class Customer
{
    public function all()
    {
    	return WooCommerce::all('customers');
    }

    public function find($id)
    {
    	return WooCommerce::find('customers/'.$id);
    }

    public function create( $data ) {
    	return WooCommerce::create('customers', $data);
    }

    public function update( $id, $data ) {
    	return WooCommerce::update('customers/'.$id, $data);
    }

    public function delete( $id, $options=[] ) {
    	return WooCommerce::delete('customers/'.$id, $options);
    }

    public function batch( $data ) {
    	return WooCommerce::create('customers/batch', $options);
    }
}
