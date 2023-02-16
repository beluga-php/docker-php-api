<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ServiceSpecModeReplicated extends \ArrayObject
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
    protected $replicas;

    public function getReplicas(): ?int
    {
        return $this->replicas;
    }

    public function setReplicas(?int $replicas): self
    {
        $this->initialized['replicas'] = true;
        $this->replicas = $replicas;

        return $this;
    }
}
