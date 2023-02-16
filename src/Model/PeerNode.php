<?php

declare(strict_types=1);

namespace Docker\API\Model;

class PeerNode extends \ArrayObject
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
     * Unique identifier of for this node in the swarm.
     *
     * @var string|null
     */
    protected $nodeID;
    /**
     * IP address and ports at which this node can be reached.
     *
     * @var string|null
     */
    protected $addr;

    /**
     * Unique identifier of for this node in the swarm.
     */
    public function getNodeID(): ?string
    {
        return $this->nodeID;
    }

    /**
     * Unique identifier of for this node in the swarm.
     */
    public function setNodeID(?string $nodeID): self
    {
        $this->initialized['nodeID'] = true;
        $this->nodeID = $nodeID;

        return $this;
    }

    /**
     * IP address and ports at which this node can be reached.
     */
    public function getAddr(): ?string
    {
        return $this->addr;
    }

    /**
     * IP address and ports at which this node can be reached.
     */
    public function setAddr(?string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;

        return $this;
    }
}
