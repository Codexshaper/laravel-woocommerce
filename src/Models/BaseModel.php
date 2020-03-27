<?php

namespace Codexshaper\WooCommerce\Models;

class BaseModel
{
    protected $properties = [];

    /**
     * Get  Inaccessible Property.
     *
     * @param string $name
     *
     * @return int|string|array|object|null
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * Set Option.
     *
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function __call($method, $parameters)
    {
        return $this->$method(...$parameters);
    }

    public static function __callStatic($method, $parameters)
    {
        return (new static() )->$method(...$parameters);
    }
}
