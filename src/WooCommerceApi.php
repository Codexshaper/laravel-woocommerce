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
//        try {
//            $this->setConfig(  config('multisite.default') );
//        } catch (\Exception $e) {
//            throw new \Exception($e->getMessage(), 1);
//        }
    }

    public function setConfig($config)
    {
        $config = config('multisite.' . $config);

        $this->headers = [
            'header_total'       => $config['header_total'] ?? 'X-WP-Total',
            'header_total_pages' => $config['header_total_pages'] ?? 'X-WP-TotalPages',
        ];

        $this->client = new Client(
            $config['store_url'],
            $config['consumer_key'],
            $config['consumer_secret'],
            [
                'version'           => 'wc/' . $config['api_version'],
                'wp_api'            => $config['wp_api'],
                'verify_ssl'        => $config['verify_ssl'],
                'query_string_auth' => $config['query_string_auth'],
                'timeout'           => $config['timeout'],
            ]
        );

        return $this;
    }
}
