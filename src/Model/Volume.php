<?php

declare(strict_types=1);

namespace Docker\API\Model;

class Volume extends \ArrayObject
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
     * Name of the volume.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Name of the volume driver used by the volume.
     *
     * @var string|null
     */
    protected $driver;
    /**
     * Mount path of the volume on the host.
     *
     * @var string|null
     */
    protected $mountpoint;
    /**
     * Date/Time the volume was created.
     *
     * @var string|null
     */
    protected $createdAt;
    /**
     * Low-level details about the volume, provided by the volume driver.
     * Details are returned as a map with key/value pairs:
     * `{"key":"value","key2":"value2"}`.
     *
     * The `Status` field is optional, and is omitted if the volume driver
     * does not support this feature.
     *
     * @var VolumeStatusItem[]|null
     */
    protected $status;
    /**
     * User-defined key/value metadata.
     *
     * @var string[]|null
     */
    protected $labels;
    /**
     * The level at which the volume exists. Either `global` for cluster-wide,
     * or `local` for machine level.
     *
     * @var string|null
     */
    protected $scope = 'local';
    /**
     * The driver specific options used when creating the volume.
     *
     * @var string[]|null
     */
    protected $options;
    /**
     * Usage details about the volume. This information is used by the
     * `GET /system/df` endpoint, and omitted in other endpoints.
     *
     * @var VolumeUsageData|null
     */
    protected $usageData;

    /**
     * Name of the volume.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the volume.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Name of the volume driver used by the volume.
     */
    public function getDriver(): ?string
    {
        return $this->driver;
    }

    /**
     * Name of the volume driver used by the volume.
     */
    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * Mount path of the volume on the host.
     */
    public function getMountpoint(): ?string
    {
        return $this->mountpoint;
    }

    /**
     * Mount path of the volume on the host.
     */
    public function setMountpoint(?string $mountpoint): self
    {
        $this->initialized['mountpoint'] = true;
        $this->mountpoint = $mountpoint;

        return $this;
    }

    /**
     * Date/Time the volume was created.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Date/Time the volume was created.
     */
    public function setCreatedAt(?string $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Low-level details about the volume, provided by the volume driver.
     * Details are returned as a map with key/value pairs:
     * `{"key":"value","key2":"value2"}`.
     *
     * The `Status` field is optional, and is omitted if the volume driver
     * does not support this feature.
     *
     * @return VolumeStatusItem[]|null
     */
    public function getStatus(): ?iterable
    {
        return $this->status;
    }

    /**
     * Low-level details about the volume, provided by the volume driver.
     * Details are returned as a map with key/value pairs:
     * `{"key":"value","key2":"value2"}`.
     *
     * The `Status` field is optional, and is omitted if the volume driver
     * does not support this feature.
     *
     * @param VolumeStatusItem[]|null $status
     */
    public function setStatus(?iterable $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

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
     * The level at which the volume exists. Either `global` for cluster-wide,
     * or `local` for machine level.
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * The level at which the volume exists. Either `global` for cluster-wide,
     * or `local` for machine level.
     */
    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * The driver specific options used when creating the volume.
     *
     * @return string[]|null
     */
    public function getOptions(): ?iterable
    {
        return $this->options;
    }

    /**
     * The driver specific options used when creating the volume.
     *
     * @param string[]|null $options
     */
    public function setOptions(?iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    /**
     * Usage details about the volume. This information is used by the
     * `GET /system/df` endpoint, and omitted in other endpoints.
     */
    public function getUsageData(): ?VolumeUsageData
    {
        return $this->usageData;
    }

    /**
     * Usage details about the volume. This information is used by the
     * `GET /system/df` endpoint, and omitted in other endpoints.
     */
    public function setUsageData(?VolumeUsageData $usageData): self
    {
        $this->initialized['usageData'] = true;
        $this->usageData = $usageData;

        return $this;
    }
}
