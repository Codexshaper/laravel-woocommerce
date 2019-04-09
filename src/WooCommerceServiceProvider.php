<?php

namespace Codexshaper\Woocommerce;

use Codexshaper\Woocommerce\WoocommerceApi;
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
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        
        $this->publishes([
            __DIR__.'/config/woocommerce.php' => config_path('woocommerce.php'),
        ],'woocommerce');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        
        $this->mergeConfigFrom(
            __DIR__.'/config/woocommerce.php', 'woocommerce'
        );

        $this->app->singleton('WoocommerceApi', function(){
            return new WoocommerceApi(); 
        });
        // $app->alias('Codexshaper\Woocommerce\WoocommerceApi', 'WoocommerceApi');
    }
}
