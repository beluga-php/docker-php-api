<?php

declare(strict_types=1);

namespace Docker\API\Model;

class MountVolumeOptions extends \ArrayObject
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
     * Populate volume with data from the target.
     *
     * @var bool|null
     */
    protected $noCopy = false;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>|null
     */
    protected $labels;
    /**
     * Map of driver specific options.
     *
     * @var MountVolumeOptionsDriverConfig|null
     */
    protected $driverConfig;
    /**
     * Source path inside the volume. Must be relative without any back traversals.
     *
     * @var string|null
     */
    protected $subpath;

    /**
     * Populate volume with data from the target.
     */
    public function getNoCopy(): ?bool
    {
        return $this->noCopy;
    }

    /**
     * Populate volume with data from the target.
     */
    public function setNoCopy(?bool $noCopy): self
    {
        $this->initialized['noCopy'] = true;
        $this->noCopy = $noCopy;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>|null
     */
    public function getLabels(): ?iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param array<string, string>|null $labels
     */
    public function setLabels(?iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * Map of driver specific options.
     */
    public function getDriverConfig(): ?MountVolumeOptionsDriverConfig
    {
        return $this->driverConfig;
    }

    /**
     * Map of driver specific options.
     */
    public function setDriverConfig(?MountVolumeOptionsDriverConfig $driverConfig): self
    {
        $this->initialized['driverConfig'] = true;
        $this->driverConfig = $driverConfig;

        return $this;
    }

    /**
     * Source path inside the volume. Must be relative without any back traversals.
     */
    public function getSubpath(): ?string
    {
        return $this->subpath;
    }

    /**
     * Source path inside the volume. Must be relative without any back traversals.
     */
    public function setSubpath(?string $subpath): self
    {
        $this->initialized['subpath'] = true;
        $this->subpath = $subpath;

        return $this;
    }
}
