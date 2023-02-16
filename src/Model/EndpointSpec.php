<?php

declare(strict_types=1);

namespace Docker\API\Model;

class EndpointSpec extends \ArrayObject
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
     * The mode of resolution to use for internal load balancing between tasks.
     *
     * @var string|null
     */
    protected $mode = 'vip';
    /**
     * List of exposed ports that this service is accessible on from the
     * outside. Ports can only be provided if `vip` resolution mode is used.
     *
     * @var EndpointPortConfig[]|null
     */
    protected $ports;

    /**
     * The mode of resolution to use for internal load balancing between tasks.
     */
    public function getMode(): ?string
    {
        return $this->mode;
    }

    /**
     * The mode of resolution to use for internal load balancing between tasks.
     */
    public function setMode(?string $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;

        return $this;
    }

    /**
     * List of exposed ports that this service is accessible on from the
     * outside. Ports can only be provided if `vip` resolution mode is used.
     *
     * @return EndpointPortConfig[]|null
     */
    public function getPorts(): ?array
    {
        return $this->ports;
    }

    /**
     * List of exposed ports that this service is accessible on from the
     * outside. Ports can only be provided if `vip` resolution mode is used.
     *
     * @param EndpointPortConfig[]|null $ports
     */
    public function setPorts(?array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;

        return $this;
    }
}
