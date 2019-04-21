<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;

class Order
{

    public function all()
    {
    	return WooCommerce::all('orders');
    }

    public function find($id)
    {
    	return WooCommerce::find("orders/{$id}");
    }

    public function create( $data ) {
    	return WooCommerce::create('orders', $data);
    }

    public function update( $id, $data ) {
    	return WooCommerce::update("orders/{$id}", $data);
    }

    public function delete( $id, $options=[] ) {
    	return WooCommerce::delete("orders/{$id}", $options);
    }

    public function batch( $data ) {
    	return WooCommerce::create('orders/batch', $options);
    }

    /*
     * Note
     */

    public function notes( $order_id )
    {
    	return WooCommerce::all("orders/{$order_id}/notes");
    }

    public function note( $order_id, $note_id )
    {
    	return WooCommerce::create("orders/{$order_id}/notes/{$note_id}");
    }

    public function createNote( $order_id )
    {
    	return WooCommerce::create("orders/{$order_id}/notes");
    }

    public function deleteNote( $order_id, $note_id, $options = [] ) {
    	return WooCommerce::delete("orders/{$order_id}/notes/{$note_id}", $options);
    }

    /*
     * Refund
     */

    public function refunds( $order_id )
    {
    	return WooCommerce::all("orders/{$order_id}/refunds");
    }

    public function refund( $order_id, $refund_id )
    {
    	return WooCommerce::create("orders/{$order_id}/refunds/{$refund_id}");
    }

    public function createRefund( $order_id )
    {
    	return WooCommerce::create("orders/{$order_id}/refunds");
    }

    public function deleteRefund( $order_id, $refund_id, $options = [] ) {
    	return WooCommerce::delete("orders/{$order_id}/refunds/{$refund_id}", $options);
    }
}
