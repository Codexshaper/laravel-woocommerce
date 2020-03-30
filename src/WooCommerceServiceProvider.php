<?php

namespace Codexshaper\WooCommerce;

use Illuminate\Support\ServiceProvider;

class WooCommerceServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/woocommerce.php' => config_path('woocommerce.php'),
        ], 'woocommerce');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/woocommerce.php',
            'woocommerce'
        );

        $this->app->singleton('WooCommerceApi', function () {
            return new WooCommerceApi();
        });
        $this->app->alias('Codexshaper\Woocommerce\WooCommerceApi', 'WooCommerceApi');
    }
}
