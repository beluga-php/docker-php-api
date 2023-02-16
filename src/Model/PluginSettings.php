<?php

namespace Docker\API\Model;

class PluginSettings extends \ArrayObject
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
     * @var PluginMount[]|null
     */
    protected $mounts;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $env;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $args;
    /**
     * 
     *
     * @var PluginDevice[]|null
     */
    protected $devices;
    /**
     * 
     *
     * @return PluginMount[]|null
     */
    public function getMounts() : ?array
    {
        return $this->mounts;
    }
    /**
     * 
     *
     * @param PluginMount[]|null $mounts
     *
     * @return self
     */
    public function setMounts(?array $mounts) : self
    {
        $this->initialized['mounts'] = true;
        $this->mounts = $mounts;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getEnv() : ?array
    {
        return $this->env;
    }
    /**
     * 
     *
     * @param string[]|null $env
     *
     * @return self
     */
    public function setEnv(?array $env) : self
    {
        $this->initialized['env'] = true;
        $this->env = $env;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getArgs() : ?array
    {
        return $this->args;
    }
    /**
     * 
     *
     * @param string[]|null $args
     *
     * @return self
     */
    public function setArgs(?array $args) : self
    {
        $this->initialized['args'] = true;
        $this->args = $args;
        return $this;
    }
    /**
     * 
     *
     * @return PluginDevice[]|null
     */
    public function getDevices() : ?array
    {
        return $this->devices;
    }
    /**
     * 
     *
     * @param PluginDevice[]|null $devices
     *
     * @return self
     */
    public function setDevices(?array $devices) : self
    {
        $this->initialized['devices'] = true;
        $this->devices = $devices;
        return $this;
    }
}