<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Webhook extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'webhooks';
}
