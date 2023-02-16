<?php

namespace Docker\API\Model;

class ImageMetadata extends \ArrayObject
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
    protected $lastTagTime;
    /**
     * 
     *
     * @return string|null
     */
    public function getLastTagTime() : ?string
    {
        return $this->lastTagTime;
    }
    /**
     * 
     *
     * @param string|null $lastTagTime
     *
     * @return self
     */
    public function setLastTagTime(?string $lastTagTime) : self
    {
        $this->initialized['lastTagTime'] = true;
        $this->lastTagTime = $lastTagTime;
        return $this;
    }
}