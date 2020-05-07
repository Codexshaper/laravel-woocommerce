<?php

namespace Codexshaper\WooCommerce\Traits;

use Codexshaper\WooCommerce\Facades\WooCommerce;

trait QueryBuilderTrait
{
    /**
     * @var
     */
    protected $options = [];
    /**
     * @var
     */
    protected $where = [];
    /**
     * @var
     */
    protected $properties = [];

    /**
     * Retrieve all Items.
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
     * Retrieve single Item.
     *
     * @param int   $id
     * @param array $options
     *
     * @return object
     */
    protected function find($id, $options = [])
    {
        return WooCommerce::find("{$this->endpoint}/{$id}", $options);
    }

    /**
     * Create new Item.
     *
     * @param array $data
     *
     * @return object
     */
    protected function create($data)
    {
        return WooCommerce::create($this->endpoint, $data);
    }

    /**
     * Update Existing Item.
     *
     * @param int   $id
     * @param array $data
     *
     * @return object
     */
    protected function update($id, $data)
    {
        return WooCommerce::update("{$this->endpoint}/{$id}", $data);
    }

    /**
     * Destroy Item.
     *
     * @param int   $id
     * @param array $options
     *
     * @return object
     */
    protected function delete($id, $options = [])
    {
        return WooCommerce::delete("{$this->endpoint}/{$id}", $options);
    }

    /**
     * Batch Update.
     *
     * @param array $data
     *
     * @return object
     */
    protected function batch($data)
    {
        return WooCommerce::create("{$this->endpoint}/batch", $data);
    }

    /**
     * Retrieve data.
     *
     * @return array
     */
    protected function get()
    {
        try {
            $results = WooCommerce::all($this->endpoint, $this->options);

            return $results;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), 1);
        }
    }

    /**
     * Retrieve data.
     *
     * @return object
     */
    protected function first()
    {
        return $this->get()[0] ?? new \stdClass();
    }

    /**
     * Set options for woocommerce request.
     *
     * @param array $parameters
     *
     * @return object $this
     */
    protected function options($parameters)
    {
        if (!is_array($parameters)) {
            throw new \Exception('Options must be an array', 1);
        }

        if (empty($parameters)) {
            throw new \Exception('Options must be pass at least one element', 1);
        }

        foreach ($parameters as $key => $value) {
            $this->options[$key] = $value;
        }

        return $this;
    }

    /**
     * Join options for woocommerce request.
     *
     * @param array $parameters
     *
     * @return object $this
     */
    protected function where(...$parameters)
    {
        if (count($parameters) < 2 || count($parameters) > 3) {
            throw new \Exception('Too many arguments. You can pass minimum 2 and maximum 3 paramneters');
        }
        $field = $parameters[0];
        $value = count($parameters) == 3 ? $parameters[2] : $parameters[1];

        switch ($field) {
            case 'name':
            case 'title':
            case 'description':
                $this->options['search'] = $value;
                break;
            case 'sku':
                $this->options['sku'] = $value;
                break;
            case 'type':
                $this->options['type'] = $value;
                break;
            case 'category':
                $this->options['category'] = $value;
                break;
            case 'tag':
                $this->options['tag'] = $value;
                break;
            case 'after':
                $this->options['after'] = $value;
                break;
            case 'before':
                $this->options['before'] = $value;
                break;
            case 'attribute':
                $this->options['attribute'] = $value;
                break;
            case 'attribute_term':
                $this->options['attribute_term'] = $value;
                break;
            case 'in_stock':
                $this->options['in_stock'] = $value;
                break;
            case 'featured':
                $this->options['featured'] = $value;
                break;
            case 'min_price':
                $this->options['min_price'] = $value;
                break;
            case 'max_price':
                $this->options['max_price'] = $value;
                break;
            case 'shipping_class':
                $this->options['shipping_class'] = $value;
                break;
            case 'tax_class':
                $this->options['tax_class'] = $value;
                break;
        }

        return $this;
    }

    /**
     * Set order direction.
     *
     * @param string $name
     * @param string $direction
     *
     * @return object $this
     */
    protected function orderBy($name, $direction = 'desc')
    {
        $this->options['orderby'] = $name;
        $this->options['order'] = $direction;

        return $this;
    }

    /**
     * Paginate results.
     *
     * @param int $per_page
     * @param int $current_page
     *
     * @return array
     */
    protected function paginate($per_page, $current_page = 1)
    {
        try {
            $this->options['per_page'] = (int) $per_page;

            if ($current_page > 0) {
                $this->options['page'] = (int) $current_page;
            }

            $results = $this->get();
            $totalResults = WooCommerce::countResults();
            $totalPages = WooCommerce::countPages();
            $currentPage = WooCommerce::current();
            $previousPage = WooCommerce::previous();
            $nextPage = WooCommerce::next();

            $pagination = [
                'total_results' => $totalResults,
                'total_pages'   => $totalPages,
                'current_page'  => $currentPage,
                'previous_page' => $previousPage,
                'next_page'     => $nextPage,
                'first_page'    => 1,
                'last_page'     => $totalResults,
            ];

            $results['pagination'] = $pagination;

            return $results;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), 1);
        }
    }

    /**
     * Count all results.
     *
     * @return int
     */
    protected function count()
    {
        try {
            $results = WooCommerce::all($this->endpoint, $this->options);
            $totalResults = WooCommerce::countResults();

            return $totalResults;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), 1);
        }
    }

    /**
     * Store data.
     *
     * @return array
     */
    public function save()
    {
        $this->results = WooCommerce::create($this->endpoint, $this->properties);

        return $this->results;
    }
}
