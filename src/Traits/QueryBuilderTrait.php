<?php

namespace Codexshaper\WooCommerce\Traits;

use Codexshaper\WooCommerce\Facades\WooCommerce;
use Illuminate\Support\LazyCollection;

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
     * @var
     */
    protected $isLazyCollection = false;

    /**
     * @var
     */
    protected $isCollection = true;

    /**
     * @var
     */
    protected $isOriginal = false;

    /**
     * Retrieve all Items.
     *
     * @param array $options
     *
     * @return array
     */
    protected function all($options = [])
    {
        if ($this->isLazyCollection) {
            return LazyCollection::make(WooCommerce::all($this->endpoint, $options));
        }

        if ($this->isCollection) {
            return collect(WooCommerce::all($this->endpoint, $options));
        }

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
        if ($this->isLazyCollection) {
            return LazyCollection::make(WooCommerce::find("{$this->endpoint}/{$id}", $options));
        }

        if ($this->isCollection) {
            return collect(WooCommerce::find("{$this->endpoint}/{$id}", $options));
        }

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
        if ($this->isLazyCollection) {
            return LazyCollection::make(WooCommerce::create($this->endpoint, $data));
        }

        if ($this->isCollection) {
            return collect(WooCommerce::create($this->endpoint, $data));
        }

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
        if ($this->isLazyCollection) {
            return LazyCollection::make(WooCommerce::update("{$this->endpoint}/{$id}", $data));
        }

        if ($this->isCollection) {
            return collect(WooCommerce::update("{$this->endpoint}/{$id}", $data));
        }

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
        if ($this->isLazyCollection) {
            return LazyCollection::make(WooCommerce::delete("{$this->endpoint}/{$id}", $options));
        }

        if ($this->isCollection) {
            return collect(WooCommerce::delete("{$this->endpoint}/{$id}", $options));
        }

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
        if ($this->isLazyCollection) {
            return LazyCollection::make(WooCommerce::create("{$this->endpoint}/batch", $data));
        }

        if ($this->isCollection) {
            return collect(WooCommerce::create("{$this->endpoint}/batch", $data));
        }

        return WooCommerce::create("{$this->endpoint}/batch", $data);
    }

    /**
     * Retrieve data.
     *
     * @return array
     */
    protected function get()
    {
        if ($this->isLazyCollection) {
            return LazyCollection::make(WooCommerce::all($this->endpoint, $this->options));
        }

        if ($this->isCollection) {
            return collect(WooCommerce::all($this->endpoint, $this->options));
        }

        return WooCommerce::all($this->endpoint, $this->options);
    }

    /**
     * Retrieve data.
     *
     * @return object
     */
    protected function first()
    {
        if ($this->isLazyCollection) {
            return LazyCollection::make($this->get()[0] ?? new \stdClass());
        }

        if ($this->isCollection) {
            return collect($this->get()[0] ?? new \stdClass());
        }

        return collect($this->get()[0] ?? new \stdClass());
    }

    /**
     * Set original.
     *
     * @return object $this
     */
    protected function withOriginal()
    {
        $this->isOriginal = true;
        $this->isCollection = false;
        $this->isLazyCollection = false;

        return $this;
    }

    /**
     * Set collection.
     *
     * @return object $this
     */
    protected function withCollection()
    {
        $this->isOriginal = false;
        $this->isCollection = true;
        $this->isLazyCollection = false;

        return $this;
    }

    /**
     * Set lazy collection.
     *
     * @return object $this
     */
    protected function withLazyCollection()
    {
        $this->isOriginal = false;
        $this->isCollection = false;
        $this->isLazyCollection = true;

        return $this;
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
            throw new \Exception('You can pass minimum 2 and maximum 3 paramneters');
        }
        $field = strtolower($parameters[0]);
        $value = count($parameters) == 3 ? $parameters[2] : $parameters[1];

        switch ($field) {
            case 'name': case 'title': case 'description':
                $this->options['search'] = $value;
                break;
            default:
                $this->options[$field] = $value;
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
     * @param int   $per_page
     * @param int   $current_page
     * @param array $options
     *
     * @return array
     */
    protected function paginate($per_page = 10, $current_page = 1, $options = [])
    {
        try {
            $this->options['per_page'] = (int) $per_page;

            if ($current_page > 0) {
                $this->options['page'] = (int) $current_page;
            }

            foreach ($options as $option => $value) {
                $this->options[$option] = $value;
            }

            $data = $this->get();
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

            $results = [
                'meta'       => $pagination,
                'data'       => $data,
            ];

            if ($this->isLazyCollection) {
                return LazyCollection::make($results);
            }

            if ($this->isCollection) {
                return collect($results);
            }

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

        if ($this->isLazyCollection) {
            return LazyCollection::make($this->results);
        }

        if ($this->isCollection) {
            return collect($this->results);
        }

        return $this->results;
    }
}
