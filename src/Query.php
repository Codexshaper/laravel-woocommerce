<?php

namespace Codexshaper\WooCommerce;

use Codexshaper\WooCommerce\Models\BaseModel;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Query extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint;
    protected static $instance = null;

    public function __construct($endpoint = '')
    {
        $this->endpoint = $endpoint;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function init($config)
    {
        if (!static::$instance) {
            static::$instance = (new static())->withConfig($config ?? config('multisite.default'));
        }

        return static::$instance;
    }
}
