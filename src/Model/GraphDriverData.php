<?php

namespace Docker\API\Model;

class GraphDriverData extends \ArrayObject
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
     * @var string[]|null
     */
    protected $data;
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
     * @return string[]|null
     */
    public function getData() : ?iterable
    {
        return $this->data;
    }
    /**
     * 
     *
     * @param string[]|null $data
     *
     * @return self
     */
    public function setData(?iterable $data) : self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}