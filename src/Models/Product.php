<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Product extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'products';
}
