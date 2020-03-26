<?php

use Codexshaper\Woocommerce\Facades\WoocommerceFacade as Woocommerce;

Route::get('woocommerce/test', function () {
    return Woocommerce::get('');
});
