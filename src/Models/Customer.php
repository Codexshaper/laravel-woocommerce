<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Customer extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'customers';
}
