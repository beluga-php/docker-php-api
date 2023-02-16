<?php

namespace Docker\API\Model;

class HostConfigLogConfig extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $config;
    /**
     * 
     *
     * @return string|null
     */
    public function getType() : ?string
    {
        return $this->type;
    }
    /**
     * 
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type) : self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getConfig() : ?iterable
    {
        return $this->config;
    }
    /**
     * 
     *
     * @param string[]|null $config
     *
     * @return self
     */
    public function setConfig(?iterable $config) : self
    {
        $this->initialized['config'] = true;
        $this->config = $config;
        return $this;
    }
}