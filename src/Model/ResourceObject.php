<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ResourceObject extends \ArrayObject
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
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @var GenericResourcesItem[]|null
     */
    protected $genericResources;

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
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @return GenericResourcesItem[]|null
     */
    public function getGenericResources(): ?array
    {
        return $this->genericResources;
    }

    /**
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @param GenericResourcesItem[]|null $genericResources
     */
    public function setGenericResources(?array $genericResources): self
    {
        $this->initialized['genericResources'] = true;
        $this->genericResources = $genericResources;

        return $this;
    }
}
