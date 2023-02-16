<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ManagerStatus extends \ArrayObject
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
     * @var bool|null
     */
    protected $leader = false;
    /**
     * Reachability represents the reachability of a node.
     *
     * @var string|null
     */
    protected $reachability;
    /**
     * The IP address and port at which the manager is reachable.
     *
     * @var string|null
     */
    protected $addr;

    public function getLeader(): ?bool
    {
        return $this->leader;
    }

    public function setLeader(?bool $leader): self
    {
        $this->initialized['leader'] = true;
        $this->leader = $leader;

        return $this;
    }

    /**
     * Reachability represents the reachability of a node.
     */
    public function getReachability(): ?string
    {
        return $this->reachability;
    }

    /**
     * Reachability represents the reachability of a node.
     */
    public function setReachability(?string $reachability): self
    {
        $this->initialized['reachability'] = true;
        $this->reachability = $reachability;

        return $this;
    }

    /**
     * The IP address and port at which the manager is reachable.
     */
    public function getAddr(): ?string
    {
        return $this->addr;
    }

    /**
     * The IP address and port at which the manager is reachable.
     */
    public function setAddr(?string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;

        return $this;
    }
}
