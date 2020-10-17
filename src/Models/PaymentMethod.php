<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class PaymentMethod extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'payment_gateways';
}
