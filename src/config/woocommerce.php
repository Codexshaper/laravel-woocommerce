<?php

    /**
     *================================================================================
     * Unless using a single remote site configuration DO NOT CHANGE THIS FILE!
     *================================================================================.
     */

return [
    /**
     *================================================================================
     * Store URL eg: http://example.com
     *================================================================================.
     */
    'store_url'         =>  config( 'multisite.' . env('WOOCOMMERCE_DEFAULT_STORE', 'development') . '.store_url'),

    /**
     *================================================================================
     * Consumer Key
     *================================================================================.
     */
    'consumer_key'      => config( 'multisite.' . env('WOOCOMMERCE_DEFAULT_STORE', 'development') . '.consumer_key'),

    /**
     * Consumer Secret.
     */
    'consumer_secret'      => config( 'multisite.' . env('WOOCOMMERCE_DEFAULT_STORE', 'development') . '.consumer_secret'),

    /**
     *================================================================================
     * SSL support, default is false. 
     *================================================================================.
     */
    'verify_ssl'        => config( 'multisite.' . env('WOOCOMMERCE_DEFAULT_STORE', 'development') . '.verify_ssl', false),

    /**
     *================================================================================
     * Woocommerce API version, default is v3
     *================================================================================.
     */
    'api_version'       => config( 'multisite.' . env('WOOCOMMERCE_DEFAULT_STORE', 'development') . '.api_version', 'v3'),

    /**
     *================================================================================
     * Enable WP API Integration
     *================================================================================.
     */
    'wp_api'            => config( 'multisite.' . env('WOOCOMMERCE_DEFAULT_STORE', 'development') . '.wp_api', true),

    /**
     *================================================================================
     * Force Basic Authentication as query string
     *================================================================================.
     */
    'query_string_auth' => config( 'multisite.' . env('WOOCOMMERCE_DEFAULT_STORE', 'development') . '.query_string_auth', false),

    /**
     *================================================================================
     * Default WP timeout
     *================================================================================.
     */
    'timeout'           => config( 'multisite.' . env('WOOCOMMERCE_DEFAULT_STORE', 'development') . '.timeout', 100),

    /**
     *================================================================================
     * Total results header
     * Default value X-WP-Total
     *================================================================================.
     */
    'header_total'           => config( 'multisite.' . env('WOOCOMMERCE_DEFAULT_STORE', 'development') . '.header_total', 'X-WP-Total'),

    /**
     *================================================================================
     * Total pages header
     * Default value X-WP-TotalPages
     *================================================================================.
     */
    'header_total_pages'           => config( 'multisite.' . env('WOOCOMMERCE_DEFAULT_STORE', 'development') . '.header_total_pages', 'X-WP-TotalPages'),
];
