<?php

namespace Codexshaper\Woocommerce\Traits;

trait WoocommerceTrait
{
    public function get($endpoints, $args = [])
    {
        // return $this->client->get($endpoints, $args);
        return config('woocommerce.store_url');
    }
}