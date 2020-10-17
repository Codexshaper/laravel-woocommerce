<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class PaymentGateway extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'payment_gateways';
}
