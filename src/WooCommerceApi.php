<?php

namespace Codexshaper\WooCommerce;

use Automattic\WooCommerce\Client;
use Codexshaper\WooCommerce\Traits\WooCommerceTrait;

class WooCommerceApi
{
    use WooCommerceTrait;

    /**
     * @var \Automattic\WooCommerce\Client
     */
    protected $client;

    protected $config;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * Build Woocommerce connection.
     *
     * @return void
     */
    public function __construct(string $config)
    {
        $this->config = config('multisite.' . $config);

        $this->headers = [
            'header_total'       => $this->config['header_total'] ?? 'X-WP-Total',
            'header_total_pages' => $this->config['header_total_pages'] ?? 'X-WP-TotalPages',
        ];

        $this->client = new Client(
            $this->config['store_url'],
            $this->config['consumer_key'],
            $this->config['consumer_secret'],
            [
                'version'           => 'wc/' . $this->config['api_version'],
                'wp_api'            => $this->config['wp_api'],
                'verify_ssl'        => $this->config['verify_ssl'],
                'query_string_auth' => $this->config['query_string_auth'],
                'timeout'           => $this->config['timeout'],
            ]
        );
    }
}
