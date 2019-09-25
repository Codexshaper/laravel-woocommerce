<?php

namespace Codexshaper\WooCommerce\Traits;

use Codexshaper\WooCommerce\Facades\WooCommerce;

trait QueryBuilderTrait
{
    /**
     * @var $options
     */
    protected $options = [];

    /**
     * Retrieve data
     *
     * @return array
     */
    public function get()
    {
        return WooCommerce::all($this->endpoint, $this->options);
    }

    /**
     * Retrieve data
     *
     * @return object
     */
    public function first()
    {
        return collect($this->get()[0]);
    }

    /**
     * Set options for woocommerce request
     *
     * @param array $parameters
     *
     * @return object $this
     */
    public function options($parameters)
    {
        if (!is_array($parameters)) {
            throw new \Exception("Options must be an array", 1);
        }

        if (empty($parameters)) {
            throw new \Exception("Options must be pass at least one element", 1);
        }

        foreach ($parameters as $key => $value) {

            $this->options[$key] = $value;
        }

        return $this;
    }

    /**
     * Join options for woocommerce request
     *
     * @param array $parameters
     *
     * @return object $this
     */
    public function where(...$parameters)
    {
        if (count($parameters) == 2) {
            $this->options[$parameters[0]] = $parameters[1];
        }

        if (count($parameters) == 1) {
            foreach ($parameters as $parameter) {
                foreach ($parameter as $key => $value) {
                    $this->options[$key] = $value;
                }
            }
        }
        return $this;
    }

    /**
     *
     * @param string $name
     * @param string $direction
     *
     * @return object $this
     */
    public function orderBy($name, $direction = 'desc')
    {
        $this->options['orderby'] = $name;
        $this->options['order']   = $direction;

        return $this;
    }
}
