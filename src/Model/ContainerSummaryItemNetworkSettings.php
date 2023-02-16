<?php

namespace Docker\API\Model;

class ContainerSummaryItemNetworkSettings extends \ArrayObject
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
     * @var EndpointSettings[]|null
     */
    protected $networks;
    /**
     * 
     *
     * @return EndpointSettings[]|null
     */
    public function getNetworks() : ?iterable
    {
        return $this->networks;
    }
    /**
     * 
     *
     * @param EndpointSettings[]|null $networks
     *
     * @return self
     */
    public function setNetworks(?iterable $networks) : self
    {
        $this->initialized['networks'] = true;
        $this->networks = $networks;
        return $this;
    }
}