<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Tax extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'taxes';
}
