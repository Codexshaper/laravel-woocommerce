<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Coupon extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'coupons';
}
