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
     * @var string[]|null
     */
    protected $labels;
    /**
     * Map of driver specific options.
     *
     * @var MountVolumeOptionsDriverConfig|null
     */
    protected $driverConfig;

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
     * @return string[]|null
     */
    public function getLabels(): ?iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param string[]|null $labels
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
}
