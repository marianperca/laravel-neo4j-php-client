<?php

namespace TSF\Neo4jClient;

use GraphAware\Neo4j\Client\ClientBuilder;

class Neo4jClient
{
    /**
     * @var array
     */
    protected $config = [];

    private $uri_format = '%s://%s:%s@%s:%d'; // format 'PROTOCOL://USER:PASS@HOST:PORT';

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public static function create(array $config)
    {
        return new static($config);
    }

    /**
     * Build Neo4j Client
     *
     * @return \GraphAware\Neo4j\Client\ClientInterface
     */
    public function build()
    {
        $uri = sprintf($this->uri_format, $this->getProtocol(), $this->getUser(), $this->getPass(), $this->getHost(), $this->getPort());

        return ClientBuilder::create()
            ->addConnection($this->getProtocol(), $uri)
            ->build();
    }

    /**
     * Get the connection protocol
     *
     * @return string
     */
    private function getProtocol()
    {
        return $this->getConfig('protocol', 'default');
    }

    /**
     * Get an option from the configuration options.
     *
     * @param  string $option
     * @param  mixed $default
     * @return mixed
     */
    public function getConfig($option, $default = null)
    {
        return array_get($this->config, $option, $default);
    }

    /**
     * Get the connection username
     *
     * @return string
     */
    private function getUser()
    {
        return $this->getConfig('username');
    }

    /**
     * Get the connection password
     *
     * @return string
     */
    private function getPass()
    {
        return $this->getConfig('password');
    }

    /**
     * Get the connection host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->getConfig('host');
    }

    /**
     * Get the connection port
     *
     * @return string
     */
    private function getPort()
    {
        return $this->getConfig('port');
    }
}