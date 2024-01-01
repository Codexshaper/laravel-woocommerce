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
            $this->setConfig( config('multisite.' . config('multisite.default') ));
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }

    public function setConfig($configSet)
    {
        $this->headers = [
            'header_total'       => $configSet['header_total'] ?? 'X-WP-Total',
            'header_total_pages' => $configSet['header_total_pages'] ?? 'X-WP-TotalPages',
        ];

        $this->client = new Client(
            $configSet['tore_url'],
            $configSet['consumer_key'],
            $configSet['consumer_secret'],
            [
                'version'           => 'wc/' . $configSet['api_version'],
                'wp_api'            => $configSet['wp_api_integration'],
                'verify_ssl'        => $configSet['verify_ssl'],
                'query_string_auth' => $configSet['query_string_auth'],
                'timeout'           => $configSet['timeout'],
            ]
        );
    }
}
