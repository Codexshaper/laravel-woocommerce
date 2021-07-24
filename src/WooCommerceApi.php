<?php

namespace Codexshaper\WooCommerce;

use Automattic\WooCommerce\Client;
use Codexshaper\WooCommerce\Traits\WooCommerceTrait;

class WooCommerceApi
{
    use WooCommerceTrait;

    /**
     *@var \Automattic\WooCommerce\Client
     */
    protected $client;

    /**
     *@var array
     */
    protected $headers = [];

    /**
     * Build Woocommerce connection.
     *
     * @return void
     */
    public function __construct()
    {
        try {
           $this->forStore();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }

    public function forStore(string $store="")
    {
        if ( $store !=="" ) {
            $store = "multisite." . $store;
        }
         $this->headers = [
                'header_total'       => config($store.'.header_total') ?? 'X-WP-Total',
                'header_total_pages' => config($store.'.header_total_pages') ?? 'X-WP-TotalPages',
            ];

            $this->client = new Client(
                config($store.'.store_url'),
                config($store.'.consumer_key'),
                config($store.'.consumer_secret'),
                [
                    'version'           => 'wc/'.config($store.'.api_version'),
                    'wp_api'            => config($store.'.wp_api_integration'),
                    'verify_ssl'        => config($store.'.verify_ssl'),
                    'query_string_auth' => config($store.'.query_string_auth'),
                    'timeout'           => config($store.'.timeout'),
                ]
            );
    }
}
