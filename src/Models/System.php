<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class System extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint;

    /**
     * Retrieve all Items.
     *
     * @param array $options
     *
     * @return array
     */
    protected function status($options = [])
    {
        return WooCommerce::all('system_status', $options);
    }

    /**
     * Retrieve single tool.
     *
     * @param int   $id
     * @param array $options
     *
     * @return object
     */
    protected function tool($id, $options = [])
    {
        return WooCommerce::find("system_status/tools/{$id}", $options);
    }

    /**
     * Retrieve all tools.
     *
     * @param array $options
     *
     * @return array
     */
    protected function tools($options = [])
    {
        return WooCommerce::all('system_status/tools', $options);
    }

    /**
     * Run tool.
     *
     * @param int   $id
     * @param array $data
     *
     * @return object
     */
    protected function run($id, $data)
    {
        return WooCommerce::update("system_status/tools/{$id}", $data);
    }
}
