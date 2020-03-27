<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class TaxClass extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'taxes/classes';
}
