<?php

use Codexshaper\Woocommerce\Facades\WoocommerceFacade as Woocommerce;

Route::get('test', function () {
    return Woocommerce::get('');
});
