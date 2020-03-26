<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\WooCommerce;

class Setting extends BaseModel
{
	
    protected $endpoint = 'settings';

    /**
     * Retrieve all Items
     *
     * @param array $options
     *
     * @return array
     */
    protected function all($options = [])
    {
        return WooCommerce::all($this->endpoint, $options);
    }

    /**
     * Retrieve option
     *
     * @param integer $group_id
     * @param integer $id
     * @param array $options
     *
     * @return array
     */
    protected function option($group_id, $id, $options = [])
    {
        return collect(WooCommerce::find("settings/{$group_id}/{$id}", $options));
    }

    /**
     * Retrieve options
     *
     * @param integer $id
     * @param array $options
     *
     * @return array
     */
    protected function options($id, $options = [])
    {
        return collect(WooCommerce::find("settings/{$id}", $options));
    }

    /**
     * Update Existing Item
     *
     * @param integer $group_id
     * @param integer $id
     * @param array $data
     *
     * @return object
     */
    protected function update($group_id, $id, $data)
    {
        return WooCommerce::update("settings/{$group_id}/{$id}", $data);
    }

    /**
     * Batch Update
     *
     * @param array $data
     *
     * @return object
     */
    protected function batch($id, $data)
    {
        return WooCommerce::create("settings/{$id}/batch", $data);
    }
}
