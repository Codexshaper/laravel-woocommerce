<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class ShippingMethod extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'shipping_methods';
}
