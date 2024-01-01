<?php

namespace Codexshaper\WooCommerce;

use Automattic\WooCommerce\Client;
use Codexshaper\WooCommerce\Traits\WooCommerceTrait;

class WooCommerceAnalyticsApi
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
            $this->headers = [
                'header_total'       => config('woocommerce.header_total') ?? 'X-WP-Total',
                'header_total_pages' => config('woocommerce.header_total_pages') ?? 'X-WP-TotalPages',
            ];

            $this->client = new Client(
                config('woocommerce.store_url'),
                config('woocommerce.consumer_key'),
                config('woocommerce.consumer_secret'),
                [
                    'version'           => 'wc-analytics',
                    'wp_api'            => config('woocommerce.wp_api_integration'),
                    'verify_ssl'        => config('woocommerce.verify_ssl'),
                    'query_string_auth' => config('woocommerce.query_string_auth'),
                    'timeout'           => config('woocommerce.timeout'),
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }
}
