<?php

namespace Codexshaper\Woocommerce;

use Automattic\WooCommerce\Client;
use Codexshaper\Woocommerce\Traits\WoocommerceTrait;

class WoocommerceApi extends Client
{
	use WoocommerceTrait;

	protected $client;

	public function __construct()
	{
		$this->client = Parent::__construct(
                	config('woocommerce.store_url'),
                	config('woocommerce.consumer_key'),
                	config('woocommerce.consumer_secret'),
	                [
	                    'version' => 'wc/'.config('woocommerce.api_version'),
	                    'verify_ssl' => config('woocommerce.verify_ssl'),
	                    'wp_api' => config('woocommerce.wp_api_integration'),
	                    'query_string_auth' => config('woocommerce.query_string_auth'),
	                    'timeout' => config('woocommerce.timeout'),
	                ]);
	}

}