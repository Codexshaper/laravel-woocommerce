<?php

namespace Codexshaper\WooCommerce\Traits;

trait WooCommerceTrait
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
        try {
            self::__construct();

            return $this->client->get($endpoint, $options);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
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
        try {
            self::__construct();

            return $this->client->get($endpoint, $options);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
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
        try {
            self::__construct();

            return $this->client->post($endpoint, $data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
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
        try {
            self::__construct();

            return $this->client->put($endpoint, $data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
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
        try {
            self::__construct();

            return $this->client->delete($endpoint, $options);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }

    /**
     * Return the last request header.
     *
     * @return \Automattic\WooCommerce\HttpClient\Request
     */
    public function getRequest()
    {
        try {
            return $this->client->http->getRequest();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }

    /**
     * Return the http response headers from last request.
     *
     * @return \Automattic\WooCommerce\HttpClient\Response
     */
    public function getResponse()
    {
        try {
            return $this->client->http->getResponse();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }

    /**
     * Count the total results and return it.
     *
     * @return int
     */
    public function countResults()
    {
        return (int) $this->getResponse()->getHeaders()[$this->headers['header_total']];
    }

    /**
     * Count the total pages and return.
     *
     * @return mixed
     */
    public function countPages()
    {
        return (int) $this->getResponse()->getHeaders()[$this->headers['header_total_pages']];
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
