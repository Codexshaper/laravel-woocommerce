<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Category extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'products/categories';
}
