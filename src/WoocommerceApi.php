<?php

namespace Codexshaper\WooCommerce;

use Automattic\WooCommerce\Client;
use Codexshaper\WooCommerce\Traits\WoocommerceTrait;

class WoocommerceApi
{
    use WooCommerceTrait;

    /**
     *@var \Automattic\WooCommerce\Client
     */
    protected $client;

    /**
     * Build Woocommerce connection.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client(
            config('woocommerce.store_url'),
            config('woocommerce.consumer_key'),
            config('woocommerce.consumer_secret'),
            [
                'version'           => 'wc/'.config('woocommerce.api_version'),
                'wp_api'            => config('woocommerce.wp_api_integration'),
                'verify_ssl'        => config('woocommerce.verify_ssl'),
                'query_string_auth' => config('woocommerce.query_string_auth'),
                'timeout'           => config('woocommerce.timeout'),
            ]
        );
    }
}
