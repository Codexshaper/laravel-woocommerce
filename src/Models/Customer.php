<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Customer extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'customers';

    protected function downloads($id)
    {
    	$this->endpoint = "customers/{$id}/downloads";
    	return self::all();
    }
}
