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
     * Retrieve all products
     *
     * @param array $options
     *
     * @return array
     */
    public function all($options = [])
    {
        return WooCommerce::all($this->endpoint, $options);
    }

    /**
     * Retrieve single product
     *
     * @param integer $id
     * @param array $options
     *
     * @return object
     */
    public function find($id, $options = [])
    {
        return collect(WooCommerce::find("{$this->endpoint}/{$id}", $options));
    }

    /**
     * Create new product
     *
     * @param array $data
     *
     * @return object
     */
    public function create($data)
    {
        return WooCommerce::create($this->endpoint, $data);
    }

    public function update($id, $data)
    {
        return WooCommerce::update("{$this->endpoint}/{$id}", $data);
    }

    public function delete($id, $options = [])
    {
        return WooCommerce::delete("{$this->endpoint}/{$id}", $options);
    }

    public function batch($data)
    {
        return WooCommerce::create('{$this->endpoint}/batch', $options);
    }

    /**
     * Retrieve data
     *
     * @return array
     */
    public function get()
    {
        $orders = WooCommerce::all($this->endpoint, $this->options);

        if (empty($this->where)) {
            return $orders;
        }
        $filteredOrders = [];
        foreach ($this->where as $key => $where) {

            foreach ($orders as $order) {
                $name      = $where['name'];
                $name      = $order->$name;
                $operator  = ($where['operator'] == '=') ? $where['operator'] . "=" : $where['operator'];
                $value     = $where['value'];
                $condition = "'$name' $operator '$value'";
                if (eval("return $condition;")) {
                    $filteredOrders[] = $order;
                }
            }
        }

        return $filteredOrders;
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
        if (count($parameters) == 3) {
            $where = [
                'name'     => $parameters[0],
                'operator' => $parameters[1],
                'value'    => $parameters[2],
            ];
            $this->where[] = $where;
        }

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
