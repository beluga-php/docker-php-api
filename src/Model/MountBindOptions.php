<?php

declare(strict_types=1);

namespace Docker\API\Model;

class MountBindOptions extends \ArrayObject
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
     * Make the mount non-recursively read-only, but still leave the mount recursive
     * (unless NonRecursive is set to `true` in conjunction).
     *
     * Addded in v1.44, before that version all read-only mounts were
     * non-recursive by default. To match the previous behaviour this
     * will default to `true` for clients on versions prior to v1.44.
     *
     * @var bool|null
     */
    protected $readOnlyNonRecursive = false;
    /**
     * Raise an error if the mount cannot be made recursively read-only.
     *
     * @var bool|null
     */
    protected $readOnlyForceRecursive = false;

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

    /**
     * Make the mount non-recursively read-only, but still leave the mount recursive
     * (unless NonRecursive is set to `true` in conjunction).
     *
     * Addded in v1.44, before that version all read-only mounts were
     * non-recursive by default. To match the previous behaviour this
     * will default to `true` for clients on versions prior to v1.44.
     */
    public function getReadOnlyNonRecursive(): ?bool
    {
        return $this->readOnlyNonRecursive;
    }

    /**
     * Make the mount non-recursively read-only, but still leave the mount recursive
     * (unless NonRecursive is set to `true` in conjunction).
     *
     * Addded in v1.44, before that version all read-only mounts were
     * non-recursive by default. To match the previous behaviour this
     * will default to `true` for clients on versions prior to v1.44.
     */
    public function setReadOnlyNonRecursive(?bool $readOnlyNonRecursive): self
    {
        $this->initialized['readOnlyNonRecursive'] = true;
        $this->readOnlyNonRecursive = $readOnlyNonRecursive;

        return $this;
    }

    /**
     * Raise an error if the mount cannot be made recursively read-only.
     */
    public function getReadOnlyForceRecursive(): ?bool
    {
        return $this->readOnlyForceRecursive;
    }

    /**
     * Raise an error if the mount cannot be made recursively read-only.
     */
    public function setReadOnlyForceRecursive(?bool $readOnlyForceRecursive): self
    {
        $this->initialized['readOnlyForceRecursive'] = true;
        $this->readOnlyForceRecursive = $readOnlyForceRecursive;

        return $this;
    }
}
