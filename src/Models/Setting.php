<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\Query;
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
        return Query::init()
            ->setEndpoint("settings/{$group_id}")
            ->find($id, $options);
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
        return Query::init()
            ->setEndpoint('settings')
            ->find($id, $options);
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
        return Query::init()
            ->setEndpoint("settings/{$group_id}")
            ->update($id, $data);
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
        return Query::init()
            ->setEndpoint("settings/{$id}")
            ->batch($data);
    }
}
