<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class MountBindOptions implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * A propagation mode with the value `[r]private`, `[r]shared`, or `[r]slave`.
     *
     * @var string|null
     */
    protected $propagation;
    /**
     * Disable recursive bind mount.
     *
     * @var bool|null
     */
    protected $nonRecursive = false;
    /**
     * Create mount point on host if missing.
     *
     * @var bool|null
     */
    protected $createMountpoint = false;

    /**
     * A propagation mode with the value `[r]private`, `[r]shared`, or `[r]slave`.
     */
    public function getPropagation(): ?string
    {
        return $this->propagation;
    }

    /**
     * A propagation mode with the value `[r]private`, `[r]shared`, or `[r]slave`.
     */
    public function setPropagation(?string $propagation): self
    {
        $this->initialized['propagation'] = true;
        $this->propagation = $propagation;

        return $this;
    }

    /**
     * Disable recursive bind mount.
     */
    public function getNonRecursive(): ?bool
    {
        return $this->nonRecursive;
    }

    /**
     * Disable recursive bind mount.
     */
    public function setNonRecursive(?bool $nonRecursive): self
    {
        $this->initialized['nonRecursive'] = true;
        $this->nonRecursive = $nonRecursive;

        return $this;
    }

    /**
     * Create mount point on host if missing.
     */
    public function getCreateMountpoint(): ?bool
    {
        return $this->createMountpoint;
    }

    /**
     * Create mount point on host if missing.
     */
    public function setCreateMountpoint(?bool $createMountpoint): self
    {
        $this->initialized['createMountpoint'] = true;
        $this->createMountpoint = $createMountpoint;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['propagation' => ['Propagation', 'getPropagation', 'setPropagation'], 'nonRecursive' => ['NonRecursive', 'getNonRecursive', 'setNonRecursive'], 'createMountpoint' => ['CreateMountpoint', 'getCreateMountpoint', 'setCreateMountpoint']];
    }
}
