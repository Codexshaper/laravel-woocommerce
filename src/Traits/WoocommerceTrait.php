<?php

namespace Codexshaper\WooCommerce\Traits;

trait WoocommerceTrait
{
    /**
     * GET method.
     * Retrieve data.
     *
     * @param string $endpoint API endpoint.
     * @param array  $options
     *
     * @return array
     */
    public function all($endpoint = '', $options = [])
    {
        self::__construct();

        return $this->client->get($endpoint, $options);
    }

    /**
     * GET method.
     * Retrieve Single data.
     *
     * @param string $endpoint API endpoint.
     * @param array  $options
     *
     * @return array
     */
    public function find($endpoint = '', $options = [])
    {
        self::__construct();

        return $this->client->get($endpoint, $options);
    }

    /**
     * POST method.
     * Insert data.
     *
     * @param string $endpoint API endpoint.
     * @param array  $data
     *
     * @return array
     */
    public function create($endpoint, $data)
    {
        self::__construct();

        return $this->client->post($endpoint, $data);
    }

    /**
     * PUT method.
     * Update data.
     *
     * @param string $endpoint API endpoint.
     * @param array  $data
     *
     * @return array
     */
    public function update($endpoint, $data)
    {
        self::__construct();

        return $this->client->put($endpoint, $data);
    }

    /**
     * DELETE method.
     * Remove data.
     *
     * @param string $endpoint API endpoint.
     * @param array  $options
     *
     * @return array
     */
    public function delete($endpoint, $options = [])
    {
        self::__construct();

        return $this->client->delete($endpoint, $options);
    }

    /**
     * Return the last request header.
     *
     * @return \Automattic\WooCommerce\HttpClient\Request
     */
    public function getRequest()
    {
        self::__construct();

        return $this->client->http->getRequest();
    }

    /**
     * Return the http response headers from last request.
     *
     * @return \Automattic\WooCommerce\HttpClient\Response
     */
    public function getResponse()
    {
        self::__construct();

        return $this->client->http->getResponse();
    }

    /**
     * Count the total results and return it.
     *
     * @return int
     */
    public function countResults()
    {
        return (int) $this->getResponse()->getHeaders()['X-WP-Total'];
    }

    /**
     * Count the total pages and return.
     *
     * @return mixed
     */
    public function countPages()
    {
        return (int) $this->getResponse()->getHeaders()['X-WP-TotalPages'];
    }

    /**
     * Return the current page number.
     *
     * @return int
     */
    public function current()
    {
        return !empty($this->getRequest()->getParameters()['page']) ? $this->getRequest()->getParameters()['page'] : 1;
    }

    /**
     * Return the previous page number.
     *
     * @return int|null
     */
    public function previous()
    {
        $currentPage = $this->current();

        return ($currentPage-- > 1) ? $currentPage : null;
    }

    /**
     * Return the next page number.
     *
     * @return int|null
     */
    public function next()
    {
        $currentPage = $this->current();

        return ($currentPage++ < $this->countPages()) ? $currentPage : null;
    }
}
