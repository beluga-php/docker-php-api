<?php

declare(strict_types=1);

namespace Docker\API\Model;

class PortStatus extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * @var list<EndpointPortConfig>|null
     */
    protected $ports;

    /**
     * @return list<EndpointPortConfig>|null
     */
    public function getPorts(): ?array
    {
        return $this->ports;
    }

    /**
     * @param list<EndpointPortConfig>|null $ports
     */
    public function setPorts(?array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;

        return $this;
    }
}
