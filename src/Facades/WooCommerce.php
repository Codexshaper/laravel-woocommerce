<?php

namespace Codexshaper\WooCommerce\Facades;

use Codexshaper\WooCommerce\WooCommerceApi;
use Illuminate\Support\Facades\Facade;

class WooCommerce extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return WooCommerceApi::class;
    }
}
