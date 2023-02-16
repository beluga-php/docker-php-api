<?php

namespace Docker\API\Model;

class Driver extends \ArrayObject
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
     * Name of the driver.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Key/value map of driver-specific options.
     *
     * @var string[]|null
     */
    protected $options;
    /**
     * Name of the driver.
     *
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }
    /**
     * Name of the driver.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name) : self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Key/value map of driver-specific options.
     *
     * @return string[]|null
     */
    public function getOptions() : ?iterable
    {
        return $this->options;
    }
    /**
     * Key/value map of driver-specific options.
     *
     * @param string[]|null $options
     *
     * @return self
     */
    public function setOptions(?iterable $options) : self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }
}