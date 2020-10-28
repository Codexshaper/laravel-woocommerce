<?php

namespace Codexshaper\WooCommerce\Models;

use Codexshaper\WooCommerce\Facades\Query;
use Codexshaper\WooCommerce\Facades\WooCommerce;
use Codexshaper\WooCommerce\Traits\QueryBuilderTrait;

class ShippingZone extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'shipping/zones';

    /**
     * Retrieve all Items.
     *
     * @param int   $id
     * @param array $options
     *
     * @return array
     */
    protected function getLocations($id, $options = [])
    {
        return Query::init()
            ->setEndpoint("shipping/zones/{$id}/locations")
            ->all($options);
    }

    /**
     * Update Existing Item.
     *
     * @param int   $id
     * @param array $data
     *
     * @return object
     */
    protected function updateLocations($id, $data = [])
    {
        return WooCommerce::update("shipping/zones/{$id}/locations", $data);
    }

    /**
     * Create new Item.
     *
     * @param int   $id
     * @param array $data
     *
     * @return object
     */
    protected function addShippingZoneMethod($id, $data)
    {
        return Query::init()
            ->setEndpoint("shipping/zones/{$id}/methods")
            ->create($data);
    }

    /**
     * Retrieve single Item.
     *
     * @param int   $zone_id
     * @param int   $id
     * @param array $options
     *
     * @return object
     */
    protected function getShippingZoneMethod($zone_id, $id, $options = [])
    {
        return Query::init()
            ->setEndpoint("shipping/zones/{$zone_id}/methods")
            ->find($id, $options);
    }

    /**
     * Retrieve all Items.
     *
     * @param int   $id
     * @param array $options
     *
     * @return array
     */
    protected function getShippingZoneMethods($id, $options = [])
    {
        return Query::init()
            ->setEndpoint("shipping/zones/{$id}/methods")
            ->all($options);
    }

    /**
     * Update Existing Item.
     *
     * @param int   $zone_id
     * @param int   $id
     * @param array $data
     *
     * @return object
     */
    protected function updateShippingZoneMethod($zone_id, $id, $data = [])
    {
        return Query::init()
            ->setEndpoint("shipping/zones/{$zone_id}/methods")
            ->update($id, $data);
    }

    /**
     * Destroy Item.
     *
     * @param int   $zone_id
     * @param int   $id
     * @param array $options
     *
     * @return object
     */
    protected function deleteShippingZoneMethod($zone_id, $id, $options = [])
    {
        return Query::init()
            ->setEndpoint("shipping/zones/{$zone_id}/methods")
            ->delete($id, $options);
    }
}
