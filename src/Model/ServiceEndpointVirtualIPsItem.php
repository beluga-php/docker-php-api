<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ServiceEndpointVirtualIPsItem extends \ArrayObject
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
     * @var string|null
     */
    protected $networkID;
    /**
     * @var string|null
     */
    protected $addr;

    public function getNetworkID(): ?string
    {
        return $this->networkID;
    }

    public function setNetworkID(?string $networkID): self
    {
        $this->initialized['networkID'] = true;
        $this->networkID = $networkID;

        return $this;
    }

    public function getAddr(): ?string
    {
        return $this->addr;
    }

    public function setAddr(?string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;

        return $this;
    }
}
