<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Tag extends BaseModel
{
	use QueryBuilderTrait;
	
    protected $endpoint = 'products/tags';
}
