<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Review extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'products/reviews';
}
