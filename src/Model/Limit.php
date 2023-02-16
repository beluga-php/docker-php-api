<?php

declare(strict_types=1);

namespace Docker\API\Model;

class Limit extends \ArrayObject
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
     * @var int|null
     */
    protected $nanoCPUs;
    /**
     * @var int|null
     */
    protected $memoryBytes;
    /**
     * Limits the maximum number of PIDs in the container. Set `0` for unlimited.
     *
     * @var int|null
     */
    protected $pids = 0;

    public function getNanoCPUs(): ?int
    {
        return $this->nanoCPUs;
    }

    public function setNanoCPUs(?int $nanoCPUs): self
    {
        $this->initialized['nanoCPUs'] = true;
        $this->nanoCPUs = $nanoCPUs;

        return $this;
    }

    public function getMemoryBytes(): ?int
    {
        return $this->memoryBytes;
    }

    public function setMemoryBytes(?int $memoryBytes): self
    {
        $this->initialized['memoryBytes'] = true;
        $this->memoryBytes = $memoryBytes;

        return $this;
    }

    /**
     * Limits the maximum number of PIDs in the container. Set `0` for unlimited.
     */
    public function getPids(): ?int
    {
        return $this->pids;
    }

    /**
     * Limits the maximum number of PIDs in the container. Set `0` for unlimited.
     */
    public function setPids(?int $pids): self
    {
        $this->initialized['pids'] = true;
        $this->pids = $pids;

        return $this;
    }
}
