<?php

namespace Docker\API\Model;

class Network extends \ArrayObject
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
    protected $name;
    /**
     * 
     *
     * @var string|null
     */
    protected $id;
    /**
     * 
     *
     * @var string|null
     */
    protected $created;
    /**
     * 
     *
     * @var string|null
     */
    protected $scope;
    /**
     * 
     *
     * @var string|null
     */
    protected $driver;
    /**
     * 
     *
     * @var bool|null
     */
    protected $enableIPv6;
    /**
     * 
     *
     * @var IPAM|null
     */
    protected $iPAM;
    /**
     * 
     *
     * @var bool|null
     */
    protected $internal;
    /**
     * 
     *
     * @var bool|null
     */
    protected $attachable;
    /**
     * 
     *
     * @var bool|null
     */
    protected $ingress;
    /**
     * 
     *
     * @var NetworkContainer[]|null
     */
    protected $containers;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $options;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $labels;
    /**
     * 
     *
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }
    /**
     * 
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
     * 
     *
     * @return string|null
     */
    public function getId() : ?string
    {
        return $this->id;
    }
    /**
     * 
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id) : self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getCreated() : ?string
    {
        return $this->created;
    }
    /**
     * 
     *
     * @param string|null $created
     *
     * @return self
     */
    public function setCreated(?string $created) : self
    {
        $this->initialized['created'] = true;
        $this->created = $created;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getScope() : ?string
    {
        return $this->scope;
    }
    /**
     * 
     *
     * @param string|null $scope
     *
     * @return self
     */
    public function setScope(?string $scope) : self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getDriver() : ?string
    {
        return $this->driver;
    }
    /**
     * 
     *
     * @param string|null $driver
     *
     * @return self
     */
    public function setDriver(?string $driver) : self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;
        return $this;
    }
    /**
     * 
     *
     * @return bool|null
     */
    public function getEnableIPv6() : ?bool
    {
        return $this->enableIPv6;
    }
    /**
     * 
     *
     * @param bool|null $enableIPv6
     *
     * @return self
     */
    public function setEnableIPv6(?bool $enableIPv6) : self
    {
        $this->initialized['enableIPv6'] = true;
        $this->enableIPv6 = $enableIPv6;
        return $this;
    }
    /**
     * 
     *
     * @return IPAM|null
     */
    public function getIPAM() : ?IPAM
    {
        return $this->iPAM;
    }
    /**
     * 
     *
     * @param IPAM|null $iPAM
     *
     * @return self
     */
    public function setIPAM(?IPAM $iPAM) : self
    {
        $this->initialized['iPAM'] = true;
        $this->iPAM = $iPAM;
        return $this;
    }
    /**
     * 
     *
     * @return bool|null
     */
    public function getInternal() : ?bool
    {
        return $this->internal;
    }
    /**
     * 
     *
     * @param bool|null $internal
     *
     * @return self
     */
    public function setInternal(?bool $internal) : self
    {
        $this->initialized['internal'] = true;
        $this->internal = $internal;
        return $this;
    }
    /**
     * 
     *
     * @return bool|null
     */
    public function getAttachable() : ?bool
    {
        return $this->attachable;
    }
    /**
     * 
     *
     * @param bool|null $attachable
     *
     * @return self
     */
    public function setAttachable(?bool $attachable) : self
    {
        $this->initialized['attachable'] = true;
        $this->attachable = $attachable;
        return $this;
    }
    /**
     * 
     *
     * @return bool|null
     */
    public function getIngress() : ?bool
    {
        return $this->ingress;
    }
    /**
     * 
     *
     * @param bool|null $ingress
     *
     * @return self
     */
    public function setIngress(?bool $ingress) : self
    {
        $this->initialized['ingress'] = true;
        $this->ingress = $ingress;
        return $this;
    }
    /**
     * 
     *
     * @return NetworkContainer[]|null
     */
    public function getContainers() : ?iterable
    {
        return $this->containers;
    }
    /**
     * 
     *
     * @param NetworkContainer[]|null $containers
     *
     * @return self
     */
    public function setContainers(?iterable $containers) : self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getOptions() : ?iterable
    {
        return $this->options;
    }
    /**
     * 
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
    /**
     * 
     *
     * @return string[]|null
     */
    public function getLabels() : ?iterable
    {
        return $this->labels;
    }
    /**
     * 
     *
     * @param string[]|null $labels
     *
     * @return self
     */
    public function setLabels(?iterable $labels) : self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
}