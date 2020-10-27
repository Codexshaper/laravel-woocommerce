<?php

namespace Codexshaper\WooCommerce\Models;

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
        $this->endpoint = 'system_status';

        return self::all($options);
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
        $this->endpoint = 'system_status/tools';

        return self::find($id, $options);
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
        $this->endpoint = 'system_status/tools';

        return self::all($options);
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
        $this->endpoint = 'system_status/tools';

        return self::update($id, $data);
    }
}
