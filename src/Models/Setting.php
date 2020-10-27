<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class Setting extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'settings';

    /**
     * Retrieve option.
     *
     * @param int   $group_id
     * @param int   $id
     * @param array $options
     *
     * @return array
     */
    protected function option($group_id, $id, $options = [])
    {
        $this->endpoint = "settings/{$group_id}";

        return self::find($id, $options);
    }

    /**
     * Retrieve options.
     *
     * @param int   $id
     * @param array $options
     *
     * @return array
     */
    protected function options($id, $options = [])
    {
        return self::find($id, $options);
    }

    /**
     * Update Existing Item.
     *
     * @param int   $group_id
     * @param int   $id
     * @param array $data
     *
     * @return object
     */
    protected function update($group_id, $id, $data)
    {
        $this->endpoint = "settings/{$group_id}";

        return self::update($id, $data);
    }

    /**
     * Batch Update.
     *
     * @param array $data
     *
     * @return object
     */
    protected function batch($id, $data)
    {
        $this->endpoint = "settings/{$id}";

        return self::batch($data);
    }
}
